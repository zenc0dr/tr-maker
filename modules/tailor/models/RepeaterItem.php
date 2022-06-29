<?php namespace Tailor\Models;

use Model;
use Tailor\Classes\Fieldset;
use Tailor\Classes\FieldManager;
use October\Contracts\Element\FormElement;
use SystemException;

/**
 * RepeaterItem stores generic content serialized as JSON
 *
 * @package october\tailor
 * @author Alexey Bobkov, Samuel Georges
 */
class RepeaterItem extends Model
{
    use \Tailor\Traits\DeferredContentModel;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array guarded fields
     */
    protected $guarded = [];

    /**
     * @var array fillable fields
     */
    protected $fillable = [];

    /**
     * @var array jsonable fields
     */
    protected $jsonable = ['content_value'];

    /**
     * @var array fieldValues
     */
    protected $fieldValues = [];

    /**
     * @var array staticAttrs
     */
    protected $staticAttrs = [
        'id',
        'content_group',
        'content_value',
        'content_spawn_path',
        'host_id',
        'host_type',
        'host_field',
        'sort_order',
        'site_id',
        'created_at',
        'updated_at',
    ];

    /**
     * @var array fieldsetConfig
     */
    protected $fieldsetConfig;

    /**
     * @var bool useFieldsetGroups
     */
    protected $useFieldsetGroups;

    /**
     * @var bool isBlueprintExtended prevents multiple extensions
     */
    protected $isBlueprintExtended = false;

    /**
     * morphTo
     */
    public $morphTo = [
        'host' => []
    ];

    /**
     * getTypeAttribute
     */
    public function getTypeAttribute()
    {
        return $this->content_group;
    }

    /**
     * defineFormFields
     */
    public function defineFormFields(FormElement $host)
    {
        $this->getFieldsetDefinition()->defineAllFormFields($host);
    }

    /**
     * afterFetch
     */
    protected function afterFetch()
    {
        $this->fieldValues = $this->content_value ?: [];
        $this->attributes = array_merge($this->fieldValues, $this->attributes);

        if ($this->fieldsetConfig) {
            $this->extendWithBlueprint();
        }
        else {
            $this->extendWithBlueprintSpawn($this->content_spawn_path);
        }
    }

    /**
     * beforeSave
     */
    protected function beforeSave()
    {
        foreach ($this->attributes as $key => $value) {
            if (!$this->isKeyAllowed($key)) {
                $this->fieldValues[$key] = $value;
                unset($this->attributes[$key]);
            }
        }

        if ($this->fieldValues) {
            $this->content_value = $this->fieldValues;
        }

        if (!$this->content_spawn_path) {
            $this->content_spawn_path = $this->buildSpawnPath();
        }
    }

    /**
     * afterSave
     */
    protected function afterSave()
    {
        $this->attributes = array_merge($this->fieldValues, $this->attributes);
    }

    /**
     * beforeReplicate make sure that the model is extended
     */
    protected function beforeReplicate()
    {
        $this->extendWithBlueprint();
    }

    /**
     * extendWithBlueprint
     */
    public function extendWithBlueprint()
    {
        if ($this->isBlueprintExtended) {
            return;
        }

        $this->getFieldsetDefinition()->applyModelExtensions($this);

        $this->isBlueprintExtended = true;
    }

    /**
     * extendWithBlueprintSpawn attempts to load from a respawned model, then copies the fieldset
     * definition across before extending the model.
     */
    public function extendWithBlueprintSpawn(string $spawnPath)
    {
        $model = $this->spawnFromPath($spawnPath);

        if (!$model) {
            throw new SystemException("Could not spawn from path [{$spawnPath}]");
        }

        $this->setFieldsetDefinition($model->getTable(), $model->fieldsetConfig, $model->useFieldsetGroups);

        if ($model->useFieldsetGroups) {
            $this->content_group = $model->content_group;
        }

        $this->extendWithBlueprint();
    }

    /**
     * setBlueprintFieldConfig
     */
    public function setBlueprintFieldConfig($parentModel, string $tableName, string $fieldName, array $fieldConfig, bool $useGroups)
    {
        $this->host_field = $fieldName;
        $this->setRelation('host', $parentModel);
        $this->setFieldsetDefinition($tableName, $fieldConfig, $useGroups);

        // Recursive implementation
        $this->bindEvent('model.newInstance', function($instance) use ($parentModel, $tableName, $fieldName, $fieldConfig, $useGroups) {
            $instance->setBlueprintFieldConfig($parentModel, $tableName, $fieldName, $fieldConfig, $useGroups);
        });
    }

    /**
     * isKeyAllowed checks if a key is legitimate or should be added to
     * the field value collection
     */
    protected function isKeyAllowed($key)
    {
        // Let the core columns through
        if (in_array($key, $this->staticAttrs)) {
            return true;
        }

        // Let relations through
        if ($this->hasRelation($key)) {
            return true;
        }

        return false;
    }

    /**
     * getFieldsetDefinition
     */
    protected function getFieldsetDefinition(): Fieldset
    {
        $config = $this->fieldsetConfig;

        if ($this->useFieldsetGroups) {
            $config = $config[$this->content_group] ?? array_first($config);
        }

        $fieldset = FieldManager::instance()->makeFieldset($config);

        $fieldset->validate();

        return $fieldset;
    }

    /**
     * setFieldsetDefinition
     */
    public function setFieldsetDefinition(string $tableName, array $fields, bool $useGroups): void
    {
        $this->setTable($tableName);

        $this->fieldsetConfig = $fields;

        $this->useFieldsetGroups = $useGroups;
    }

    /**
     * buildSpawnPath returns a string that can be used to respawn this related model
     * from the parent. The syntax is: class@uuid:group.relation:group.relation:group
     */
    protected function buildSpawnPath()
    {
        $host = $this->host;
        $chain = $this->host_field;
        if ($this->content_group) {
            $chain = $chain.':'.$this->content_group;
        }

        // Build child relations
        if ($host instanceof self) {
            $chain = $host->buildSpawnPath().'.'.$chain;
        }
        // Build parent model
        else {
            $primaryChain = get_class($host).'@'.$host->getBlueprintUuid();

            if ($group = $host->getBlueprintGroup()) {
                $primaryChain = $primaryChain.':'.$group;
            }

            $chain = $primaryChain.'.'.$chain;
        }

        return $chain;
    }

    /**
     * spawnFromPath will repsawn this related model from a saved path.
     * The syntax is: class@uuid:group.relation:group.relation:group
     */
    public static function spawnFromPath(string $path)
    {
        if (strpos($path, '@') === false) {
            return;
        }

        [$className, $parts] = explode('@', $path, 2);
        $parts = explode('.', $parts);

        if (!class_exists($className)) {
            return;
        }

        // Build parent model
        $parent = new $className;
        $parentParts = array_shift($parts);
        $parentParts = explode(':', $parentParts);

        $parent->setBlueprintUuid($parentParts[0]);
        if (isset($parentParts[1])) {
            $parent->setBlueprintGroup($parentParts[1]);
        }

        $parent->extendWithBlueprint();

        // Build child relations
        $childModel = $parent;
        foreach ($parts as $part) {
            $itemParts = explode(':', $part);
            $fieldName = $itemParts[0];
            if (!$fieldName) {
                return;
            }

            $childModel = $childModel->makeRelation($fieldName);
            if (!$childModel) {
                return;
            }

            if (isset($itemParts[1])) {
                $childModel->content_group = $itemParts[1];
            }

            $childModel->extendWithBlueprint();
        }

        return $childModel;
    }
}

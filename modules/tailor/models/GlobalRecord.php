<?php namespace Tailor\Models;

use Model;
use October\Contracts\Element\FormElement;
use Tailor\Classes\Blueprint\GlobalBlueprint;
use Tailor\Classes\Scopes\GlobalRecordScope;
use Tailor\Classes\BlueprintIndexer;
use ApplicationException;
use SystemException;

/**
 * GlobalRecord model for content
 *
 * @package october\tailor
 * @author Alexey Bobkov, Samuel Georges
 */
class GlobalRecord extends Model
{
    use \Tailor\Traits\DeferredContentModel;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var array implement behaviors in this model
     */
    public $implement = [
        \Tailor\Behaviors\ContentAttributeModel::class
    ];

    /**
     * @var string table associated with the model
     */
    protected $table = 'tailor_globals';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    /**
     * @var array jsonable attribute names that are json encoded and decoded from the database
     */
    protected $jsonable = ['content'];

    /**
     * definePrimaryFormFields
     */
    public function definePrimaryFormFields(FormElement $host)
    {
        $this->getFieldsetDefinition()->defineAllFormFields($host);
    }

    /**
     * afterBoot
     */
    public function afterBoot()
    {
        static::addGlobalScope(new GlobalRecordScope);
    }

    /**
     * findForGlobal
     */
    public static function findForGlobal($handle): GlobalRecord
    {
        $blueprint = BlueprintIndexer::instance()->findGlobalByHandle($handle);
        if (!$blueprint) {
            throw new ApplicationException("Global handle [{$handle}] not found");
        }

        return static::findForGlobalUuid($blueprint->uuid);
    }

    /**
     * findForGlobalUuid
     */
    public static function findForGlobalUuid($uuid): GlobalRecord
    {
        // Find existing record
        $record = static::inGlobalUuid($uuid)->first();
        if ($record) {
            return $record;
        }

        // Create new record
        $global = new static;
        $global->extendWithBlueprint($uuid);
        $global->forceSave();

        return $global;
    }

    /**
     * inGlobal
     */
    public static function inGlobal($handle)
    {
        $blueprint = BlueprintIndexer::instance()->findGlobalByHandle($handle);
        if (!$blueprint) {
            throw new ApplicationException("Global handle [{$handle}] not found");
        }

        return static::inGlobalUuid($blueprint->uuid);
    }

    /**
     * scopeInGlobalUuid
     */
    public static function inGlobalUuid($uuid)
    {
        $instance = new static;

        $instance->extendWithBlueprint($uuid);

        return $instance;
    }

    /**
     * getBlueprintAttribute
     */
    public function getBlueprintAttribute()
    {
        return $this->getBlueprintDefinition();
    }

    /**
     * getBlueprintDefinition
     */
    public function getBlueprintDefinition(): GlobalBlueprint
    {
        $uuid = $this->blueprint_uuid;
        if (!$uuid) {
            throw new SystemException('Missing section definition. Call GlobalRecord::inGlobal() to set one.');
        }

        $blueprint = BlueprintIndexer::instance()->findGlobal($uuid);
        if (!$blueprint) {
            throw new SystemException(sprintf('Unable to find global blueprint with ID "%s".', $uuid));
        }

        return $blueprint;
    }
}

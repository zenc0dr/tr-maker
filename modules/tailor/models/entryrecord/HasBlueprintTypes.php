<?php namespace Tailor\Models\EntryRecord;

use Tailor\Classes\Blueprint\SingleBlueprint;
use Tailor\Classes\Blueprint\StreamBlueprint;
use Tailor\Classes\Blueprint\StructureBlueprint;
use Tailor\Classes\Blueprint\EntryBlueprint;
use Tailor\Classes\BlueprintIndexer;
use SystemException;

/**
 * HasBlueprintTypes
 *
 * @package october\tailor
 * @author Alexey Bobkov, Samuel Georges
 */
trait HasBlueprintTypes
{
    /**
     * @var EntryRecord blueprintCache
     */
    protected $blueprintCache;

    /**
     * getBlueprintDefinition
     */
    public function getBlueprintDefinition(): EntryBlueprint
    {
        if ($this->blueprintCache !== null) {
            return $this->blueprintCache;
        }

        $uuid = $this->blueprint_uuid;
        if (!$uuid) {
            throw new SystemException('Missing section definition. Call EntryRecord::inSection() to set one.');
        }

        $blueprint = BlueprintIndexer::instance()->findSection($uuid);
        if (!$blueprint) {
            throw new SystemException(sprintf('Unable to find section blueprint with ID "%s".', $uuid));
        }

        return $this->blueprintCache = $blueprint;
    }

    /**
     * isEntryStructure
     */
    public function isEntryStructure(): bool
    {
        return $this->getBlueprintDefinition() instanceof StructureBlueprint;
    }

    /**
     * isEntryStream
     */
    public function isEntryStream(): bool
    {
        return $this->getBlueprintDefinition() instanceof StreamBlueprint;
    }

    /**
     * isEntrySingle
     */
    public function isEntrySingle(): bool
    {
        return $this->getBlueprintDefinition() instanceof SingleBlueprint;
    }

    /**
     * useDrafts
     */
    public function useDrafts(): bool
    {
        return $this->getBlueprintDefinition()->useDrafts();
    }

    /**
     * useVersions
     */
    public function useVersions(): bool
    {
        return $this->getBlueprintDefinition()->useVersions();
    }
}

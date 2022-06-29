<?php namespace Tailor\Classes\Blueprint;

use Tailor\Classes\Blueprint;
use Tailor\Classes\BlueprintCollection;

/**
 * EntryBlueprint
 *
 * @package october\tailor
 * @author Alexey Bobkov, Samuel Georges
 */
class EntryBlueprint extends Blueprint
{
    /**
     * @var string typeName of the blueprint
     */
    protected $typeName = 'entry';

    /**
     * listInProject is a modified version to find any blueprints that inherit this one
     */
    public static function listInProject(array $options = []): BlueprintCollection
    {
        $result = [];
        foreach (Blueprint::listInProject($options) as $blueprint) {
            if ($blueprint instanceof static) {
                $result[] = $blueprint;
            }
        }

        return (new static)->newCollection($result);
    }

    /**
     * useDrafts determines if this section should use drafts
     */
    public function useDrafts(): bool
    {
        return (bool) $this->drafts;
    }

    /**
     * useVersions determines if this section should capture version history
     */
    public function useVersions(): bool
    {
        // @todo version support not finished
        return false;

        return (bool) $this->versions;
    }

    /**
     * hasMultipleEntryTypes
     */
    public function hasMultipleEntryTypes(): bool
    {
        return is_array($this->groups) && count($this->groups) > 1;
    }

    /**
     * getEntryTypeOptions
     */
    public function getEntryTypeOptions(): array
    {
        if (!is_array($this->groups)) {
            return [];
        }

        $options = [];

        foreach ($this->groups as $handle => $entry) {
            $options[$handle] = $entry['name'] ?? $handle;
        }

        return $options;
    }

    /**
     * makeBlueprintTableName where type can be used for content, join or repeater
     */
    protected function makeBlueprintTableName($type = 'content'): string
    {
        $code = str_replace('-', '', $this->uuid);

        if (!$code) {
            return '';
        }

        if ($type === 'content') {
            return 'xc_'.$code.'c';
        }

        if ($type === 'join') {
            return 'xc_'.$code.'j';
        }

        if ($type === 'repeater') {
            return 'xc_'.$code.'r';
        }

        return '';
    }
}

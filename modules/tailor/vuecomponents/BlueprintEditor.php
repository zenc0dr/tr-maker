<?php namespace Tailor\VueComponents;

use Backend\Classes\VueComponentBase;

/**
 * Tailor blueprint editor Vue component
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class BlueprintEditor extends VueComponentBase
{
    protected $require = [
        \Backend\VueComponents\MonacoEditor::class
    ];
}
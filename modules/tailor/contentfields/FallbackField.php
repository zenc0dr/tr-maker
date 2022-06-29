<?php namespace Tailor\ContentFields;

use Tailor\Classes\ContentFieldBase;
use October\Contracts\Element\FormElement;
use October\Contracts\Element\ListElement;
use October\Contracts\Element\FilterElement;

/**
 * FallbackField is used when there is no content field class defined,
 * it passes configuration to the list column and form field directly.
 *
 * @package october\tailor
 * @author Alexey Bobkov, Samuel Georges
 */
class FallbackField extends ContentFieldBase
{
    /**
     * defineFormField will define how a field is displayed in a form.
     */
    public function defineFormField(FormElement $form, $context = null)
    {
        $form->addFormField($this->fieldName, $this->label)->useConfig($this->config);
    }

    /**
     * defineListColumn
     */
    public function defineListColumn(ListElement $list, $context = null)
    {
        if ($this->column) {
            $list->defineColumn($this->fieldName, $this->label)->useConfig($this->column);
        }
    }

    /**
     * defineFilterScope
     */
    public function defineFilterScope(FilterElement $filter, $context = null)
    {
        if ($this->scope) {
            $filter->defineScope($this->fieldName, $this->label)->useConfig($this->scope);
        }
    }

    /**
     * extendModelValidation
     */
    public function extendModelValidation($model)
    {
        if ($this->validation) {
            $model->rules[$this->fieldName] = $this->validation;
        }
    }

    /**
     * extendDatabaseTable
     */
    public function extendDatabaseTable($table)
    {
        $table->text($this->fieldName)->nullable();
    }
}

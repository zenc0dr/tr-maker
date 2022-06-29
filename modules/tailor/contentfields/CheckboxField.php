<?php namespace Tailor\ContentFields;

use October\Contracts\Element\FormElement;
use October\Contracts\Element\ListElement;
use October\Contracts\Element\FilterElement;

/**
 * CheckboxField
 *
 * @package october\tailor
 * @author Alexey Bobkov, Samuel Georges
 */
class CheckboxField extends FallbackField
{
    /**
     * defineFormField will define how a field is displayed in a form.
     */
    public function defineFormField(FormElement $form, $context = null)
    {
        $form->addFormField($this->fieldName, $this->label)->useConfig($this->config);
    }

    /**
     * defineListColumn will define how a field is displayed in a list.
     */
    public function defineListColumn(ListElement $list, $context = null)
    {
        $list->defineColumn($this->fieldName, $this->label)->displayAs('switch')->useConfig($this->column ?: []);
    }

    /**
     * defineFilterScope will define how a field is displayed in a filter.
     */
    public function defineFilterScope(FilterElement $filter, $context = null)
    {
        $filter->defineScope($this->fieldName, $this->label)->displayAs('switch')->useConfig($this->scope ?: []);
    }

    /**
     * extendDatabaseTable
     */
    public function extendDatabaseTable($table)
    {
        $table->boolean($this->fieldName)->nullable();
    }
}

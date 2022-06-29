<?php namespace Tailor\ContentFields;

use October\Contracts\Element\FormElement;

/**
 * DataTableField
 *
 * @package october\tailor
 * @author Alexey Bobkov, Samuel Georges
 */
class DataTableField extends FallbackField
{
    /**
     * defineFormField will define how a field is displayed in a form.
     */
    public function defineFormField(FormElement $form, $context = null)
    {
        $form->addFormField($this->fieldName, $this->label)->useConfig($this->config);
    }

    /**
     * extendModelObject will extend the record model.
     */
    public function extendModelObject($model)
    {
        $model->addJsonable($this->fieldName);
    }

    /**
     * extendDatabaseTable adds any required columns to the database.
     */
    public function extendDatabaseTable($table)
    {
        $table->mediumText($this->fieldName)->nullable();
    }
}

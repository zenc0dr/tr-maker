<!-- Checkbox -->
<div class="form-check" <?php if ($this->previewMode): ?>tabindex="0"<?php endif ?>>
    <input
        type="hidden"
        name="<?= $field->getName() ?>"
        value="0"
        <?= $this->previewMode ? 'disabled="disabled"' : '' ?>>
    <input
        class="form-check-input"
        type="checkbox"
        id="<?= $field->getId() ?>"
        name="<?= $field->getName() ?>"
        value="1"
        <?= $this->previewMode ? 'disabled="disabled"' : '' ?>
        <?= $field->isSelected() ? 'checked="checked"' : '' ?>
        <?= $field->getAttributes() ?>
    />

    <label class="form-check-label" for="<?= $field->getId() ?>">
        <?= e(trans($field->label)) ?>
    </label>
    <?php if ($field->comment): ?>
        <p class="form-text"><?= $field->commentHtml ? trans($field->comment) : e(trans($field->comment)) ?></p>
    <?php endif ?>
</div>

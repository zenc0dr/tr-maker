<?php
    $section = $this->activeSource;
?>
<div data-control="toolbar" data-list-linkage="<?= $this->listGetId() ?>">

    <?php if ($this->hasSourcePermission('create')): ?>
        <a href="<?= Backend::url('tailor/entries/'.$section->handleSlug.'/create') ?>" class="btn btn-primary">
            <?= __("Create :name Entry", ['name' => "<strong>".e($section->name)."</strong>"]) ?>
        </a>
    <?php endif ?>

    <?php if ($this->hasSourcePermission('publish', 'delete')): ?>
        <div class="btn-group dropdown dropdown-fixed">
            <button
                type="button"
                class="btn btn-secondary oc-icon-angle-down dropdown-toggle"
                data-toggle="dropdown"
                data-list-checked-trigger
            >
                <?= __("Select Action") ?>
            </button>
            <ul class="dropdown-menu">
                <?php if ($this->hasSourcePermission('publish')): ?>
                    <li>
                        <a
                            href="javascript:;"
                            class="dropdown-item"
                            data-request="onBulkAction"
                            data-request-data="action: 'disable'"
                            data-list-checked-request
                            data-request-confirm="Are you sure?"
                            data-stripe-load-indicator>
                            <i class="oc-icon-ban"></i> <?= __("Disable") ?>
                        </a>
                    </li>
                    <li>
                        <a
                            href="javascript:;"
                            class="dropdown-item"
                            data-request="onBulkAction"
                            data-request-data="action: 'enable'"
                            data-list-checked-request
                            data-request-confirm="Are you sure?"
                            data-stripe-load-indicator>
                            <i class="oc-icon-check"></i> <?= __("Enable") ?>
                        </a>
                    </li>
                <?php endif ?>
                <?php if ($this->hasSourcePermission('delete')): ?>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a
                            href="javascript:;"
                            class="dropdown-item"
                            data-request="onBulkAction"
                            data-request-data="action: 'delete'"
                            data-list-checked-request
                            data-request-confirm="Are you sure?"
                            data-stripe-load-indicator>
                            <i class="oc-icon-bomb"></i> <?= __("Delete") ?>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    <?php endif ?>
    <a
        href="<?= Backend::url('tailor/entries/'.$section->handleSlug.'/export') ?>"
        class="btn btn-secondary oc-icon-download">
        <?= __("Export") ?>
    </a>

    <?php if ($this->hasSourcePermission('create')): ?>
        <a
            href="<?= Backend::url('tailor/entries/'.$section->handleSlug.'/import') ?>"
            class="btn btn-secondary oc-icon-upload">
            <?= __("Import") ?>
        </a>
    <?php endif ?>
</div>

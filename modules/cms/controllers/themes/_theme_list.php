<?php foreach ($themes as $index => $theme): ?>

    <div id="themeListItem-<?= $theme->getId() ?>" class="layout-row min-size <?= $theme->isActiveTheme() ? 'active' : null ?>">
        <?= $this->makePartial('theme_list_item', ['theme' => $theme]) ?>
    </div>

<?php endforeach ?>

<?php if (BackendAuth::userHasAccess('cms.themes.create')): ?>
    <div class="layout-row links">
        <div class="layout-cell theme-thumbnail">
            <!-- Spacer -->
        </div>
        <div class="layout-cell theme-description">
            <a
                class="create-new-theme"
                data-control="popup"
                data-handler="onLoadCreateForm"
                data-size="huge"
                href="javascript:;">
                <?= e(trans('cms::lang.theme.create_new_blank_theme')) ?>
            </a>
            <a
                class="find-more-themes"
                href="<?= Backend::url('system/market/index/themes') ?>">
                <?= e(trans('cms::lang.theme.find_more_themes')) ?>
            </a>
        </div>
    </div>
<?php endif ?>

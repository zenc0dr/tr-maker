<?php Block::put('layout-top-row') ?>
    <div class="layout-row min-size">
        <a
            class="system-home-link back-link-other"
            href="<?= Backend::url('system/settings') ?>"
            onclick="return sideNavSettingsHomeClick()">
            <i></i><?= e(trans('system::lang.settings.home_label')) ?>
        </a>
    </div>
<?php Block::endPut() ?>

<div
    class="layout-cell sidenav-tree"
    data-control="sidenav-tree"
    data-search-input="#settings-search-input">

    <div class="layout">
        <div class="layout-row min-size">
            <a class="system-home-link" href="<?= Backend::url('system/settings') ?>">
                <i class="icon-home"></i><?= e(trans('system::lang.settings.home_label')) ?>
            </a>
        </div>
        <div class="layout-row min-size">
            <?= $this->makePartial('~/modules/system/partials/_settings_menu_toolbar.php') ?>
        </div>

        <div class="layout-row">
            <div class="layout-cell">
                <div class="layout-relative">

                    <div class="layout-absolute">
                        <div class="control-scrollbar" data-control="scrollbar">
                            <?= $this->makePartial('~/modules/system/partials/_settings_menu.php') ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!DOCTYPE html>
<html lang="<?= App::getLocale() ?>">
    <head>
        <title><?= Lang::get('backend::lang.page.no_database.label') ?></title>
        <link href="<?= Url::to('/modules/system/assets/css/styles.css') ?>" rel="stylesheet" />
        <meta name="turbo-visit-control" content="disable" />
        <meta charset="utf-8" />
    </head>
    <body>
        <div class="container">
            <h1><i class="icon-database warning"></i> <?= Lang::get('backend::lang.page.no_database.label') ?></h1>
            <p class="lead"><?= Lang::get('backend::lang.page.no_database.help') ?></p>
            <a href="<?= Url::to('/') ?>"><?= Lang::get('backend::lang.page.no_database.cms_link') ?></a>
        </div>
    </body>
</html>

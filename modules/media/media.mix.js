/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your theme assets. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

module.exports = (mix) => {
    // Component LESS
    mix.lessList('modules/media/formwidgets');
    mix.lessList('modules/media/widgets');

    // Media Manager Widget
    mix.combine([
        'modules/media/widgets/mediamanager/assets/js/mediamanager.js',
        'modules/media/widgets/mediamanager/assets/js/mediamanager.imagecroppopup.js',
        'modules/media/widgets/mediamanager/assets/js/mediamanager.popup.js',
    ], 'modules/media/widgets/mediamanager/assets/js/mediamanager-browser-min.js');
};

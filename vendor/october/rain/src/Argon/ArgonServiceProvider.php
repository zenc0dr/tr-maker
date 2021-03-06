<?php namespace October\Rain\Argon;

use October\Rain\Support\ServiceProvider;

/**
 * ArgonServiceProvider
 *
 * @package october\argon
 * @author Alexey Bobkov, Samuel Georges
 */
class ArgonServiceProvider extends ServiceProvider
{
    /**
     * register the service provider.
     */
    public function register()
    {
    }

    /**
     * boot the application events
     */
    public function boot()
    {
        $locale = $this->app['config']->get('app.locale');

        $this->setArgonLocale($locale);

        $this->app['events']->listen('locale.changed', function ($locale) {
            $this->setArgonLocale($locale);
        });
    }

    /**
     * setArgonLocale sets the locale using the correct load order.
     */
    protected function setArgonLocale($locale)
    {
        Argon::setLocale($locale);

        $fallbackLocale = $this->getFallbackLocale($locale);
        if ($locale !== $fallbackLocale) {
            Argon::setFallbackLocale($fallbackLocale);
        }
    }

    /**
     * Split the locale and use it as the fallback.
     */
    protected function getFallbackLocale($locale)
    {
        if ($position = strpos($locale, '-')) {
            $target = substr($locale, 0, $position);
            $resource = __DIR__ . '/../../../../nesbot/carbon/src/Carbon/Lang/'.$target.'.php';
            if (file_exists($resource)) {
                return $target;
            }
        }

        return $this->app['config']->get('app.fallback_locale');
    }
}

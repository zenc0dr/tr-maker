<?php namespace October\Tests\Concerns;

use System\Classes\UpdateManager;
use System\Classes\PluginManager;

trait PerformsMigrations
{
    /**
     * @var array pluginTestCaseMigratedPlugins is a cache for storing
     * which plugins have been migrated.
     */
    protected $pluginTestCaseMigratedPlugins = [];

    /**
     * migrateDatabase
     */
    protected function migrateDatabase()
    {
        // Migrate everything
        UpdateManager::instance()->update();
    }

    /**
     * migrateModules
     */
    protected function migrateModules()
    {
        // Unregister all the plugins so only the modules migrate
        PluginManager::instance()->unloadPlugins();

        // Migrate modules
        UpdateManager::instance()->update();

        // Reregister all plugins
        PluginManager::instance()->loadPlugins();
    }

    /**
     * migrateCurrentPlugin
     */
    protected function migrateCurrentPlugin()
    {
        // Detect plugin from test and autoload it
        $pluginCode = $this->guessPluginCodeFromTest();

        if ($pluginCode !== false) {
            $this->migratePluginInternal($pluginCode, false);
        }
    }

    /**
     * migratePlugin
     */
    protected function migratePlugin($code)
    {
        $this->migratePluginInternal($code);
    }

    /**
     * migratePlugin since the test environment has loaded all the test plugins
     * natively, this method will ensure the desired plugin is loaded in the system before
     * proceeding to migrate it.
     * @return void
     */
    protected function migratePluginInternal($code, $throwException = true)
    {
        // Ensure plugin is registered
        $plugin = $this->loadPluginInternal($code, $throwException);

        // Spin over dependencies and refresh them too
        $this->pluginTestCaseMigratedPlugins[$code] = $plugin;

        if (!empty($plugin->require)) {
            foreach ((array) $plugin->require as $dependency) {
                if (isset($this->pluginTestCaseMigratedPlugins[$dependency])) {
                    continue;
                }

                $this->migratePlugin($dependency);
            }
        }

        $manager = UpdateManager::instance();

        // Rollback plugin
        $manager->rollbackPlugin($code);

        // Migrate plugin
        $manager->updatePlugin($code);
    }

    /**
     * runPluginRefreshCommand
     * @deprecated use migratePlugin()
     */
    protected function runPluginRefreshCommand($code, $throwException = true)
    {
        $this->migratePlugin($code, $throwException);
    }

    /**
     * runOctoberMigrateCommand
     * @deprecated use migrateDatabase()
     */
    protected function runOctoberMigrateCommand()
    {
        $this->migrateDatabase();
    }
}

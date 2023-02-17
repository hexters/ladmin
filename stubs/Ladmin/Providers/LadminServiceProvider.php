<?php

namespace Modules\Ladmin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Modules\Ladmin\Console\Commands\GenerateDataTablesCommand;


class LadminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerMigration();

        $this->registerBladeView();

        $this->registerTranslations();

        $this->registerCommand();

        $this->setDefaultPaginationView();
    }

    /**
     * Register list of command
     *
     * @return void
     */
    protected function registerCommand()
    {

        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateDataTablesCommand::class,
            ]);
        }
    }


    /**
     * Register migration directory
     *
     * @return void
     */
    protected function registerMigration()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Databases/Migrations');
    }

    /**
     * Register blade view directory
     *
     * @return void
     */
    protected function registerBladeView()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'ladmin');
    }

    /**
     * Register Translations directory
     *
     * @return void
     */
    protected function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'ladmin');
    }

    /**
     * Set default pagination view
     *
     * @return void
     */
    protected function setDefaultPaginationView()
    {
        if (in_array(config('ladmin.template.framework', 'bootstrap'), ['bootstrap'])) {
            Paginator::defaultView(ladmin()->view_path('vendor.pagination.default'));
            Paginator::defaultSimpleView(ladmin()->view_path('vendor.pagination.simple-default'));
        }
    }
}

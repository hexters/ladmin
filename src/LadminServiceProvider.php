<?php

namespace Hexters\Ladmin;;

use Hexters\Ladmin\Console\Commands\GenerateDataTablesCommand;
use Hexters\Ladmin\Console\Commands\GenerateMenuCommand;
use Hexters\Ladmin\Console\Commands\GenerateSearchGroupCommand;
use Hexters\Ladmin\Console\Commands\InstallPackageCommand;
use Hexters\Ladmin\Console\Commands\InstallPackageModuleCommand;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class LadminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        if (!file_exists(config_path('ladmin.php'))) {
            $this->mergeConfigFrom(
                __DIR__ . '/config/config.php',
                'ladmin'
            );
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        /**
         * Publish default config file
         */
        $this->publishes([
            __DIR__ . '/config/ladmin-default.php' => config_path('ladmin.php'),
            __DIR__ . '/config/scout.php' => config_path('scout.php'),
        ], 'ladmin-config');
        
        /**
         * Publish Ladmin module
         */
        $this->publishes([
            __DIR__ . '/../modules/Ladmin' => base_path('Modules/Ladmin'),
        ], 'ladmin-module');

        /**
         * Publish menu kernel
         */
        $this->publishes([
            __DIR__ . '/../Menu' => app_path('Menu'),
        ], 'ladmin-menu');

        /**
         * Publish ladmin assets (js | css)
         */
        $this->publishes([
            __DIR__ . '/../assets' => public_path(''),
        ], 'ladmin-asset');

        /**
         * Publish custom route stub
         */
        $this->publishes([
            __DIR__ . '/../stubs' => base_path('stubs'),
        ], 'ladmin-stub');


        /**
         * Publish config file with admin option
         */
        $this->publishes([
            __DIR__ . '/config/ladmin-with-admin.php' => config_path('ladmin.php'),
            __DIR__ . '/config/scout.php' => config_path('scout.php'),
            __DIR__ . '/config/auth.php' => config_path('auth.php'),
        ], 'ladmin-config-with-admin');

        /**
         * Publish config file with admin option
         */
        $this->publishes([
            __DIR__ . '/databases/stubs' => module_path('Ladmin', 'Databases/Migrations'),
        ], 'ladmin-account-migration');

        /**
         * Publish config file with admin option
         */
        $this->publishes([
            __DIR__ . '/Models/stubs' => module_path('Ladmin', 'Models'),
        ], 'ladmin-account-model');

        /**
         * Publish config file with admin option
         */
        $this->publishes([
            __DIR__ . '/factories/stubs' => module_path('Ladmin', 'Databases/Factories'),
        ], 'ladmin-account-factory');

        /**
         * Publish config file with admin option
         */
        $this->publishes([
            __DIR__ . '/Seeders/stubs' => module_path('Ladmin', 'Databases/Seeders'),
        ], 'ladmin-database-seeder');
        

        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateMenuCommand::class,
                GenerateDataTablesCommand::class,
                InstallPackageCommand::class,
                InstallPackageModuleCommand::class,
                GenerateSearchGroupCommand::class,
            ]);
        }

        /** 
         * Register migration path
         */
        $this->loadMigrationsFrom(__DIR__ . '/databases');

        /**
         * Register gates access
         */
        foreach (ladmin()->menu()->allGates() as $gate) {
            Gate::define($gate, function (User $user) use ($gate) {
                $gates = [];
                foreach ($user->roles as $role) {
                    if (!is_null($role->gates)) {
                        array_push($gates, ...$role->gates);
                    } else {
                        array_push($gates);
                    }
                }
                return in_array($gate, $gates);
            });
        }
        
    }
}

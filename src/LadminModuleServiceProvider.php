<?php

namespace Hexters\Ladmin;

use Illuminate\Support\ServiceProvider;

class LadminModuleServiceProvider extends ServiceProvider
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

        if ($this->app->runningInConsole()) {
            $this->commands([
                SetupCommand::class,
            ]);
        }

        /**
         * Publish ladmin assets (js | css)
         */
        $this->publishes([
            __DIR__ . '/../stubs/build' => public_path('build'),
        ], 'ladmin-module-assets');

        /**
         * Publish module
         */
        $this->publishes([
            __DIR__ . '/../stubs/Ladmin' => base_path('Modules/Ladmin'),
        ], 'ladmin-module');

        /**
         * Publish module
         */
        $this->publishes([
            __DIR__ . '/../stubs/Menu' => app_path('Menu'),
        ], 'ladmin-module-menu');

        /**
         * Overide vite file
         */
        $this->publishes([
            __DIR__ . '/../stubs/other/vite.config.js' => base_path('vite.config.js'),
        ], 'ladmin-module-vite-config');


        /**
         * Publish route stub
         */
        $this->publishes([
            __DIR__ . '/../stubs/other/route.stub' => base_path('stubs/route.stub'),
        ], 'ladmin-module-route-stub');
        
    }
}

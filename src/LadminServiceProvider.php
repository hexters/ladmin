<?php

namespace Hexters\Ladmin;

use Illuminate\Support\ServiceProvider;
/**
 * Components
 */
use Hexters\Ladmin\Components\Card;
use Hexters\Ladmin\Components\Input;
use Hexters\Ladmin\Components\Menus\Sidebar;
use Hexters\Ladmin\Components\Menus\Toprightmenu;
use Hexters\Ladmin\Components\Cores\Breadcrumb;

class LadminServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
    
        /**
         * Load view template
         */
        $this->loadViewsFrom( __DIR__ . '/../Resources/Views', 'ladmin');

        /**
         * Publish 
         * php artisan vendor:publish --tag=assets --force
         */
        $this->publishes([
            __DIR__ . '/../dist/app.js' => public_path('/js/ladmin/app.js'),
            __DIR__ . '/../dist/app.css' => public_path('/css/ladmin/app.css'),
        ], 'assets');

        /**
         * Publish 
         * php artisan vendor:publish --tag=core
         */
        $this->publishes([
            __DIR__ . '/Menus/' => app_path('/Menus'),
            __DIR__ . '/config/ladmin.php' => base_path('/config/ladmin.php'),
            __DIR__ . '/Http/Controllers/' => app_path('Http/Controllers/Administrator'),
            __DIR__ . '/Http/Middleware/LadminAuthenticate.php' => app_path('Http/Middleware/LadminAuthenticate.php')
        ], 'core');

        /**
         * Migration file
         */
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');

        /**
         * View Component
         */
        $this->loadViewComponentsAs('ladmin', [
            Card::class,
            Input::class,
            Sidebar::class,
            Breadcrumb::class,
            Toprightmenu::class
        ]);
        
    }
}

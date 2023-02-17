<?php

namespace Modules\Ladmin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Ladmin\View\Components\Alert;
use Modules\Ladmin\View\Components\AuthLayout;
use Modules\Ladmin\View\Components\Button;
use Modules\Ladmin\View\Components\Card;
use Modules\Ladmin\View\Components\DataTables;
use Modules\Ladmin\View\Components\Error;
use Modules\Ladmin\View\Components\Footer;
use Modules\Ladmin\View\Components\GlobalSearch;
use Modules\Ladmin\View\Components\GuestLayout;
use Modules\Ladmin\View\Components\Input;
use Modules\Ladmin\View\Components\MenuSidebar;
use Modules\Ladmin\View\Components\Modal;
use Modules\Ladmin\View\Components\Notification;
use Modules\Ladmin\View\Components\Select;

class ComponentServiceProvider extends ServiceProvider
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
        $this->loadViewComponentsAs('ladmin', [
            GuestLayout::class,
            AuthLayout::class,
            Card::class,
            Input::class,
            Alert::class,
            Error::class,
            MenuSidebar::class,
            Notification::class,
            DataTables::class,
            GlobalSearch::class,
            Footer::class,
            Button::class,
            Select::class,
            Modal::class,
        ]);
    }
    
}

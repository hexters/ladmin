<?php

namespace Hexters\Ladmin;

use Hexters\Ladmin\Events\LadminLoginEvent;
use Hexters\Ladmin\Events\LadminLogoutEvent;
use Hexters\Ladmin\Events\LadminResetPasswordEvent;
use Hexters\Ladmin\Listeners\LadminLoginListener;
use Hexters\Ladmin\Listeners\LadminLogoutListener;
use Hexters\Ladmin\Listeners\LadminResetPasswordListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        LadminLoginEvent::class => [
            LadminLoginListener::class,
        ],
        LadminLogoutEvent::class => [
            LadminLogoutListener::class,
        ],
        LadminResetPasswordEvent::class => [
            LadminResetPasswordListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

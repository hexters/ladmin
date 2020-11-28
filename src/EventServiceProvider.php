<?php

namespace Hexters\Ladmin;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Login;

use Hexters\Ladmin\Listeners\LoginListener;
use Hexters\Ladmin\Listeners\LogOutListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
      Login::class => [
          LoginListener::class,
      ],
      Logout::class => [
          LogOutListener::class
      ]
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

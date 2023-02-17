<?php

namespace Modules\Ladmin\Providers;

use Ladmin\Engine\Http\Middleware\GuestMiddleware;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            
            Route::middleware(['web', GuestMiddleware::class])
                ->prefix(config('ladmin.prefix'))
                ->as('ladmin.')
                ->namespace($this->namespace)
                ->group(module_path('ladmin', 'routes/auth.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(module_path('ladmin', 'routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('ladmin-api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}

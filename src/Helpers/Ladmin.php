<?php

namespace Hexters\Ladmin\Helpers;

use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;
use Hexters\Ladmin\Http\Middleware\AuthMiddleware;

class Ladmin
{

    use LadminOption;

    protected function templateModule()
    {
        return config('ladmin.template.module', 'ladmin');
    }

    /**
     * Get ladmin version
     *
     * @return string
     */
    public function version()
    {
        return '2.1';
    }

    /**
     * Default model admin
     *
     * @return void
     */
    public function admin()
    {
        return app(config('ladmin.user'));
    }

    /**
     * Default model admin
     *
     * @return void
     */
    public function user()
    {
        return $this->admin();
    }

    /**
     * Get table name
     */
    public function getAdminTable() {
        return $this->admin()->getTable();
    }

    /**
     * Get table name
     */
    public function getUserTable() {
        return $this->getAdminTable();
    }

    /**
     * Gropu ladmin route
     *
     * @param Closure $routes
     * @return Closure
     */
    public function route(Closure $routes)
    {
        Route::group([
            'middleware' => AuthMiddleware::class,
            'prefix' => config('ladmin.prefix'),
            'as' => 'ladmin.'
        ], function () use ($routes) {
            return $routes();
        });
    }

    /**
     * Gropu ladmin route
     *
     * @param Closure $routes
     * @return Closure
     */
    public function routeApi(Closure $routes)
    {
        Route::group([
            'prefix' => config('ladmin.prefix'),
            'as' => 'ladmin.'
        ], function () use ($routes) {
            return $routes();
        });
    }

    /**
     * Load ladmin template
     *
     * @param [type] $blade
     * @return void
     */
    public function view($blade, $data = [])
    {
        return view($this->view_path(blade: $blade), $data);
    }

    /**
     * Load ladmin template
     *
     * @param [type] $blade
     * @return void
     */
    public function view_path($blade)
    {
        $name = $this->templateModule();
        return $name . '::' . config('ladmin.template.framework', 'bootstrap') . '.' . $blade;
    }

    /**
     * Load ladmin template
     *
     * @param [type] $blade
     * @return void
     */
    public function component($blade, $data = [])
    {
        $name = $this->templateModule();
        return view($name . '::components.' . config('ladmin.template.framework', 'bootstrap') . '.' . $blade, $data);
    }

    /**
     * Path ladmin template
     *
     * @param [type] $blade
     * @return void
     */
    public function component_path($path)
    {
        $name = $this->templateModule();
        return $name . '::components.' . config('ladmin.template.framework', 'bootstrap') . '.' . $path;
    }


    /**
     * Get full url
     *
     * @return String
     */
    public function back($data = [])
    {

        if (is_array($data)) {
            return  array_merge($data, ['back' => request()->fullUrl()]);
        }

        return [$data, 'back' => request()->fullUrl()];
    }

    /**
     * Load Menu class
     *
     * @return \Hexters\Ladmin\Helpers\Menu
     */
    public function menu()
    {
        return new Menu();
    }

    /**
     * Send notificaiton to user account
     *
     * @param \Illuminate\Foundation\Auth\User|null $user
     * @return \Hexters\Ladmin\Helpers\Notification
     */
    public function notification(?User $user = null)
    {
        return new Notification($user);
    }

    /**
     * Access page
     *
     * @param string $data
     * @return void
     */
    public function allows($data)
    {
        if (!Gate::allows($data)) {
            abort(403);
        }
    }
}

<?php

namespace Hexters\Ladmin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LadminLoginMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if(Auth::guard(config('ladmin.auth.guard', 'web'))->guest()) {
            return redirect()->route('administrator.login');
        }

        if(Auth::guard(config('ladmin.auth.guard', 'web'))->check()) {
            if(is_null(Auth::guard(config('ladmin.auth.guard', 'web'))->user()->role)) {
                abort(403, Auth::guard(config('ladmin.auth.guard', 'web'))->user()->name . ' Don\'t have access');
            }
        }

        Auth::shouldUse(config('ladmin.auth.guard', 'web'));
        return $next($request);
    }
}

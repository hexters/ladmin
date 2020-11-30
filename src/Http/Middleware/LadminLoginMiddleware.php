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

        if(auth()->guard(config('ladmin.auth.guard', 'web'))->guest()) {
            return redirect()->route('administrator.login');
        }

        if(auth()->guard(config('ladmin.auth.guard', 'web'))->check()) {
            if(is_null(auth()->guard(config('ladmin.auth.guard', 'web'))->user()->role)) {
                auth()->guard(config('ladmin.auth.guard', 'web'))->logout();
                session()->flash('warning', [
                    'Account not registered as admin'
                ]);
                return redirect()->route('administrator.login');
            }
        }

        Auth::shouldUse(config('ladmin.auth.guard', 'web'));
        return $next($request);
    }
}

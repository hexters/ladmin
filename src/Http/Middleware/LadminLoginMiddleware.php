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
            return redirect()->route('administrator.login.index');
        }

        Auth::shouldUse(config('ladmin.auth.guard', 'web'));
        return $next($request);
    }
}

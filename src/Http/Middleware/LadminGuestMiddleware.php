<?php

namespace Hexters\Ladmin\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LadminGuestMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        if(auth()->guard(config('ladmin.auth.guard', 'web'))->check()) {
            return redirect()->route('administrator.index');
        }

        Auth::shouldUse(config('ladmin.auth.guard', 'web'));
        return $next($request);
    }
}

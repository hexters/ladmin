<?php

namespace Hexters\Ladmin\Http\Middleware;

use Closure;

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
            return redrect()->route('administrator.login.index');
        }

        return $next($request);
    }
}

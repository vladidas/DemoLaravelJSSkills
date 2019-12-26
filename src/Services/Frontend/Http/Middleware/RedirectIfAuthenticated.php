<?php

namespace App\Services\Frontend\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class RedirectIfAuthenticated
 * @package App\Services\Frontend\Http\Middleware
 * @author  Vlad Golubtsov <v.golubtsov@bvblogic.com>
 */
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('user')->check()) {
            return redirect(route('frontend.home'));
        }

        return $next($request);
    }
}

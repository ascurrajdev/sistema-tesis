<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        Log::info($guards);
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if($guard == "empleados"){
                    return redirect()->route("admin.home");
                }
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
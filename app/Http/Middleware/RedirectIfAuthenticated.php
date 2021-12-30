<?php
/**
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if ($guard == "costumer" && Auth::guard($guard)->check()) {
            return redirect('/costumer');
        }
        if ($guard == "user" && Auth::guard($guard)->check()) {
            return redirect('/user');
        }
        if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }

        return $next($request);
    }
}
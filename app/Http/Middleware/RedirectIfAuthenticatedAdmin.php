<?php
/**
 */
namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard('admin')->check()){
            return redirect ()->route('HomeAdmin');
        }
        return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    
        $user = Auth::user();
            
        if($user != null){
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check() && $user->rol != 'root') {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        }else{
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        }
        

        return $next($request);
    }
}
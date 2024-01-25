<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            if (Auth::guard($guard)->check()) {

                if (Auth::user()->isClub()) {
                    $route = route('club.dashboard');
                } 
        
                if (Auth::user()->isStaff()) {
                    $route = route('staff.dashboard');
                } 

                if (Auth::user()->isParent()) {
                    $route = route('parent.dashboard');
                } 

                return redirect($route);
            }
        }

        return $next($request);
    }
}

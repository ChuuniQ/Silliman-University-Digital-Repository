<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->isAdmin == '2'){
                return $next($request);
            } else if(Auth::user()->isAdmin == '1'){
                return $next($request);
            } else {
                return redirect('/home')->with('message', 'Access Denied');
            }
            
        } else {
            return redirect('/login')->with('message', 'Login to Access');
        }
        return $next($request);
    }
}

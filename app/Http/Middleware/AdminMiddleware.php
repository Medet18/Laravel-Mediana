<?php

namespace App\Http\Middleware;

use Closure;
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
        if(\Auth::check()){
            //admin =1
            //user=0
            if(\Auth::user()->role == 1 || \Auth::user()->role == 2){
                return $next($request);
            }
            else{
                return redirect('/products')->with('message','Access denied as u arent Admin!!! ');
            }
        }
        else{
            return redirect('/api/auth/login')->with('message','Login to get access to the website!!! ');
        }

        return $next($request);

    }
}

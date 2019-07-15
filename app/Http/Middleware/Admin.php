<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //check jika user login
        if (Auth::check()) {

            # code...

            //jika user adalah admin
            if (Auth::user()->isAdmin()) {

                # code...
                return $next($request);

            }

            return redirect('/');
           
        }

        return redirect('/');

        
    }
}

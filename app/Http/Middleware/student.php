<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //return $next($request);


       if(auth()->guard('student')->check()){
        return $next($request);
       }else{
           dd('no student');
       }



    }
}

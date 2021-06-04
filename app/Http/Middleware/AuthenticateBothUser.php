<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateBothUser {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if ((!empty($request->session()->has('user'))) || (!empty($request->session()->has('adminUser')))) {
            return $next($request);
        }else{
            return redirect('/login');
        }
        
    }

}

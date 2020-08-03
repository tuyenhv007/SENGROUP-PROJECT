<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class isUser
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
        $user_login=Session::get('user');
        if (!$user_login){
            return redirect()->route('login');
        }
        return $next($request);
    }
}

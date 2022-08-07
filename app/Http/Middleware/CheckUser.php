<?php

namespace App\Http\Middleware;

use Closure;

class CheckUser
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
        if (\Auth::user()->role == 'user') {
            return $next($request);
        }elseif(\Auth::user()->role == 'admin'){
            return $next($request);
        } else {
            return response([
                "code" => 401,
                "message" => "Unauthorised",
                "response" => []
            ]);
        }
    }
}

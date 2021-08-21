<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
class AdminMiddleware
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
        //  dd(Auth::user()->role_id);
        if(Auth::check() && Auth::user()->role_id != 1) {
            return redirect('posts');
        }
        return $next($request);

    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckEditNews
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
        if((\Auth::user()->isEditor()) || (\Auth::user()->isAdmin())){
            return $next($request);
        }
        return redirect()->route('home');
    }
}

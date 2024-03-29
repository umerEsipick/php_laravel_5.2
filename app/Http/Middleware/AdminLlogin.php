<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;

class AdminLlogin
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
        if(!$request->user() || $request->user()->admin != 1)
        {
            return redirect('/');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use function redirect;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!(Auth::check() && Auth::user()->isAdmin()))
        {
            return redirect('/')->withErrors('Access denied to ADMIN functionality!');
        }
        return $next($request);
    }
}

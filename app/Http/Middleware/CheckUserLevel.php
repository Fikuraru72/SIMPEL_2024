<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserLevel
{
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (!Auth::check() || !in_array(Auth::user()->level, $levels)) {
            return redirect('/')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}

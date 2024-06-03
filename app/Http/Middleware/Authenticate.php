<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    public function handle($request, $next, ...$guards)
    {
        dd(Auth::check());


        if (!Auth::user()) {
            return redirect('login');
        }
        return $next($request);
     }

    // protected function redirectTo(): ?string
    // {
    //     if (request()->user()) {
    //         return route('login');
    //     }
    // }
}

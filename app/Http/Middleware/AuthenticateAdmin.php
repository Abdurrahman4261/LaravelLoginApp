<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->user_type == 0) {
            return $next($request);
        }

        // Admin değilse veya giriş yapmamışsa login sayfasına yönlendir
        return redirect('/login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $userType = Auth::user()->user_type;

            if ($userType == 0) {
                return redirect('/admin/dashboard');
            } elseif ($userType == 1) {
                return redirect('/user/dashboard');
            }
        }

        return $next($request);
    }
}

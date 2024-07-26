<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();

            // Periksa peran pengguna
            if ($user->level == 'admin') {
                return redirect('/admin');
            } elseif ($user->level == 'user') {
                return redirect('/user');
            }

            // Tambahkan logika tambahan untuk peran lain jika diperlukan
        }

        return $next($request);
    }
}
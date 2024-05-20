<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckProfileOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = User::where('slug', $request->route('slug'))->first();

        if (Auth::check() && Auth::user()->slug === $user->slug || Auth::user()->role === 'admin') {
            return $next($request);
        }

        return redirect('/profil/'.$user->slug)->with('error', 'Anda tidak memiliki izin untuk mengubah profil ini!');
    }
}

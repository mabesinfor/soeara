<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();
        $allowedDomains = ['@mhs.unsoed.ac.id', '@unsoed.ac.id', '@fk.unsoed.ac.id'];
        $emailDomain = substr($googleUser->email, strpos($googleUser->email, '@'));

        if (!in_array($emailDomain, $allowedDomains)) {
            return redirect('/login')->with('error', 'Anda bukan bagian dari Unsoed.');
        }

        $user = User::updateOrCreate(
            ['google_id' => $googleUser->id],
            [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Str::password(12),
                'email_verified_at' => now(),
                'avatar' => $googleUser->avatar,
            ]
        );

        Auth::login($user);
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

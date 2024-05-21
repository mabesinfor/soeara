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

        $user = User::firstOrNew(['email' => $googleUser->email]);

        if (!$user->exists) {
            $slug = Str::slug($googleUser->name, '-');
            $counter = 1;
            while (User::where('slug', $slug)->exists()) {
                $slug = Str::slug($googleUser->name, '-') . '-' . $counter;
                $counter++;
            }
            $user->slug = $slug;
            $user->avatar = $googleUser->avatar;
        }
    
        $user->google_id = $googleUser->id;
        $user->name = ucwords(strtolower($googleUser->name));
        $user->email = $googleUser->email;
        $user->password = bcrypt(Str::random(12)); 
        $user->email_verified_at = now();
    
        $user->save();
    
        Auth::login($user);
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}

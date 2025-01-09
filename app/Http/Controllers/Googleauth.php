<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class Googleauth extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email', $googleUser->email)->first();
        if(!$user)
        {
            $user = User::create(
                    [
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'password' => null
                    ]
            );
        }

        Auth::login($user);

        return redirect()->to(route('home'));
    }
}

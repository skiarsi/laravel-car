<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }


    // active registred user
    public function activation(string $token)  {
        $user = User::where('activation_token', $token)->firstOrFail();
        $user->is_active = true;
        $user->activation_token = null;
        $user->save();

        return redirect()->route('login')->with('registerSuccess', 'Your account has been activated. You can now log in.');

    }
}

<?php

namespace App\Livewire;

use App\Mail\Registeruser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Illuminate\Support\Str;

class Register extends Component
{
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $password_confirmation;

    
    
    public function register(){
        $validated = $this->validate([
            'name'              => 'required|min:3',
            'email'             => 'required|email',
            'password'          => ['required', Password::min(6)],
            'password_confirmation'   => 'required|required_with:password|same:password|min:6',
        ]);


        

        $user = User::create([
            'name'  => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'activation_token' => Str::random(60),
            'is_active' => false,
        ]);


        // send an email to user
        Mail::to($user->email)->queue(new Registeruser($user));


        session()->flash('registerSuccess', 'Please check your email to activate your account');

        return $this->redirectRoute('login',navigate:true);
    }


    public function render()
    {
        return view('livewire.register',[

        ])->title('Register new User')->layout('components.layouts.app');;
    }
}

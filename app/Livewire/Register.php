<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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


        User::create([
            'name'  => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $credentials = [
            'email' => $this->email,
            'password'  => $this->password
        ];

        Auth::attempt($credentials);

        return $this->redirectRoute('home',navigate:true);
    }


    public function render()
    {
        return view('livewire.register',[

        ])->title('Register new User')->layout('components.layouts.app');;
    }
}

<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Login extends Component
{
    public $email='';
    public $password='';

    public function login(){
        
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => ['required', Password::min(6)],
        ]);



        if(Auth::attempt($validated)){
            $user = Auth::user();
            if($user->is_active){
                return redirect()->to(route('home'),true);
            }else{
                Auth::logout();
                $this->addError('email','Your account is not active. Please check your email for activation.');
            }
        }else{
            $this->password='';
            $this->addError('email','Invalid email and/or password');
        }

        $this->password= "";
        
    }


    public function render()
    {
        return view('livewire.login',[

        ])->title('Login')->layout('components.layouts.app');
    }
}

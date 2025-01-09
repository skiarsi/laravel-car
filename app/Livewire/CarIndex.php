<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Messages;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CarIndex extends Component
{
    #[Url()]
    public $carmake, $carmodel, $id;

    public $car;

    // user infos
    #[Validate('required|min:3|max:30', as:'Name')]
    public $userName;
    #[Validate('required|email', as:'Email address')]
    public $userEmail;
    #[Validate('max:15', as:'Phone number')]
    public $userTel;
    #[Validate('max:300', as:'Message')]
    public $userText='';


    




    public function mount() {
        $this->car = Car::with(['title','carmake','carmodel','drivetype','transmission','engintype','fueltype','bodytype','dealersel','users'])
                            ->where('id',$this->id)
                            ->where('car_make',$this->carmake)
                            ->where('car_model',$this->carmodel)
                            ->tap(function ($query){
                                // views increase one more 
                                $query->increment('views',1);
                            })
                            ->first();
    }


    public function sendmessage() {
        $car = new Car;
        $this->validate();

        Messages::create([
            'name'  => $this->userName,
            'email' => $this->userEmail,
            'phone' => $this->userTel,
            'dealer' => optional($this->car->dealersel)->id,
            'car'   => $this->car->id,
            'message' => $this->userText
        ]);


        $this->userName = "";
        $this->userEmail = "";
        $this->userTel = "";
        $this->userText = "";


        session()->flash('successmsg', 'Request sent successfully.');
    }
    
    public function render()
    {
        if($this->car){
            return view('livewire.car-index',[

            ])->title($this->car->year.' '.$this->car->carmake->name.' '.$this->car->carmodel->name)->layout('components.layouts.app');
        }else{
            return view('livewire.notfound',[

            ])->title('Not Fount')->layout('components.layouts.app');
        }
    }
}

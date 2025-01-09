<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Cardealers;
use App\Models\Carmake;
use App\Models\Carmodel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Url;
use Livewire\Component;

class Dealers extends Component
{
    #[Url()]
    public $dealer_slug, $sort, $selectedmake;
    
    public $dealer;
    public $carmake;
    public $carmodel;

    public function mount() {
        $this->dealer = Cardealers::where('dealer_slug', $this->dealer_slug)->firstOrFail();
        $this->carmake = Carmake::all(['name','slug']);
        $this->carmodel = Carmodel::select(['name','slug'])->where('make_slug',$this->selectedmake)->get();
    }

    public function bookmarkcar($carid) {
        if(Auth::check()){
            $car = Car::findOrFail($carid);
            if($car->users->contains(auth()->id())){
                $car->users()->detach(auth()->id());
            }else{
                $car->users()->attach(auth()->id());
            }
        }
    }

    public function render()
    {
        $cars= Car::with(['carmake','carmodel','thumbnail','users'])
                    ->where('dealer',$this->dealer->id)
                    ->sort($this->sort)
                    ->paginate(20);

        return view('livewire.dealers',[
            'cars'  => $cars
        ])->title('Dealers - '.$this->dealer->dealer_title)->layout('components.layouts.app');
    }
}

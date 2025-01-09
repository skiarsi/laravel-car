<?php

namespace App\Livewire;

use App\Models\Bodystyle;
use App\Models\Car;
use App\Models\Cardealers;
use App\Models\Carmake;
use App\Models\Carmodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Url;
use Livewire\Component;

class Dealers extends Component
{
    #[Url()]
    public $dealer_slug, $sort, $carbrand, $carmodel, $carbody, $year, $mileage;
    
    public $dealer;
    public $carmake;
    public $allcarmodel;
    public $bodystyle;

    public function mount() {
        $this->dealer = Cardealers::where('dealer_slug', $this->dealer_slug)->firstOrFail();
        
        $this->carmake = Cache::remember('carmake', 1440, function(){
            return Carmake::all(['name','slug']);
        });

        $this->bodystyle = Cache::remember('bodystyle', 1440, function(){
            return Bodystyle::select(['id','bodystyle_title','bodystyle_slug'])->get();
        });
        
        $this->allcarmodel = Carmodel::select(['name','slug'])->where('make_slug',$this->carbrand)->get();
    }

    public function updatemodel()  {
        $this->carmodel = 'any';
        $this->allcarmodel = Carmodel::select(['name','slug'])->where('make_slug',$this->carbrand)->get();
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

                    ->ByMake($this->carbrand)
                    ->ByModel($this->carmodel)
                    ->ByBody($this->carbody)
                    ->ByYear($this->year)
                    ->ByMileage($this->mileage)
                    
                    ->sort($this->sort)
                    ->paginate(20);

        return view('livewire.dealers',[
            'cars'  => $cars
        ])->title('Dealers - '.$this->dealer->dealer_title)->layout('components.layouts.app');
    }
}

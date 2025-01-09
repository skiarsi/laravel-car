<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;

use App\Models\Bodystyle;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Car;
use App\Models\Carmake;
use App\Models\Carmodel;
use App\Models\Drivetype;
use App\Models\Engine;
use App\Models\Transmission;
use Illuminate\Support\Facades\Cache;
use Livewire\WithPagination;

class SearchResult extends Component
{
    use WithPagination;
    
    public $brands=[];
    public $allmodels = [];
    public $drivelist = [];
    public $enginelist = [];
    public $translist = [];
    public $bodylist = [];

    public $showloginmoel=false;

    #[Url]
    public $carbrand,$carmodel,$caryear,$carprice,$mileage,$carbody,$transmission,$drivetype,$engin,$cartitle,$sort;


    public function updateprice() {

    }


    public function clearfilters() {
        $this->carbrand='any';
        $this->carmodel='any';
        $this->caryear='any';
        $this->carprice='any';
        $this->mileage='any';
        $this->carbody='any';
        $this->transmission='any';
        $this->drivetype='any';
        $this->engin='any';
        $this->cartitle='any';
    }


    public function updatemodel() {
        $this->carmodel = 'any';
        $this->allmodels = Carmodel::select(['name','slug'])->where('make_slug',$this->carbrand)->get();
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





    public function mount() {


        $this->brands = Cache::remember('brands', 1440, function(){
            return Carmake::select(['name','slug'])->get();
        });

        $this->drivelist = Cache::remember('drive', 1440, function(){
            return Drivetype::select(['id','drivetype_title','drivetype_slug'])->get();
        });

        $this->enginelist = Cache::remember('drive', 1440, function(){
            return Engine::select(['engine_title','engine_slug'])->get();
        });

        $this->translist = Cache::remember('translist', 1440, function(){
            return Transmission::select(['id','transmission_title','transmission_slug'])->get();
        });

        $this->bodylist = Cache::remember('bodystyle', 1440, function(){
            return Bodystyle::select(['id','bodystyle_title','bodystyle_slug'])->get();
        });

        $this->allmodels = Carmodel::select(['name','slug'])->where('make_slug',$this->carbrand)->get();
    }


    public function render()
    {
        $carlist = Car::with(['title','carmake','carmodel','drivetype','transmission','engintype','fueltype','bodytype','dealersel','users','thumbnail'])
                        ->ByMake($this->carbrand)
                        ->ByModel($this->carmodel)
                        ->ByYear($this->caryear)
                        ->ByPrice($this->carprice)
                        ->ByMileage($this->mileage)
                        ->ByBody($this->carbody)
                        ->ByTransmission($this->transmission)
                        ->ByDrive($this->drivetype)
                        ->ByEngine($this->engin)
                        ->ByTitle($this->cartitle)
                        ->sort($this->sort)
                        ->paginate(20);
        
        return view('livewire.search-result',[
            'brands'    => $this->brands,
            'allmodels'    => $this->allmodels,
            'cars'  => $carlist,
        ])->title('used '.(($this->carbrand != 'any') ? $this->carbrand : 'cars').' '.(($this->carmodel != 'any') ? $this->carmodel : ''). ' for sell')
            ->layout('components.layouts.app');
    }
}

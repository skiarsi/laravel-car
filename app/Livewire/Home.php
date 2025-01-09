<?php

namespace App\Livewire;

use App\Models\Bodystyle;
use App\Models\Car;
use App\Models\Carmake;
use App\Models\Carmodel;
use App\Models\Drivetype;
use App\Models\Engine;
use App\Models\Transmission;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Home extends Component
{

    public $showmorefilter = false;
    public $brands = [];
    public $models = [];
    public $bodystyle = [];
    public $transmissiontype = [];
    public $drive = [];
    public $engin = [];


    public $selectedmake = 'any';
    public $selectedmodel = 'any';
    public $selecyear = 'any';
    public $selecprice = 'any';
    public $selecmileage = 'any';
    public $selectedbodystyle = 'any';
    public $selectedtransmission = 'any';
    public $selecteddrivetype = 'any';
    public $selectedengintype = 'any';
    public $title = 'any';
    public $count = 0;

    public function showfilters()  {
        $this->showmorefilter=!$this->showmorefilter;
    }



    public function updatemodel() {
        $this->selectedmodel = 'any';
        $this->models = Carmodel::select(['name','slug'])->where('make_slug',$this->selectedmake)->get();
    }

    

    public function mount() {

        $this->brands = Cache::remember('brands', 1440, function(){
            return Carmake::select(['name','slug'])->get();
            // $this->brands= Carmake::select(['name','slug'])->get();
        });

        $this->bodystyle = Cache::remember('bodystyle', 1440, function(){
            return Bodystyle::select(['id','bodystyle_title','bodystyle_slug'])->get();
        });

        $this->transmissiontype = Cache::remember('transmissiontype', 1440, function(){
            return Transmission::select(['id','transmission_title','transmission_slug'])->get();
        });

        $this->drive = Cache::remember('drive', 1440, function(){
            return Drivetype::select(['id','drivetype_title','drivetype_slug'])->get();
        });

        $this->engin = Cache::remember('engin', 1440, function(){
            return Engine::select(['id','engine_title','engine_slug'])->get();
        });

        $this->count = Car::ByMake($this->selectedmake)
                        ->ByModel($this->selectedmodel)
                        ->ByYear($this->selecyear)
                        ->ByPrice($this->selecprice)
                        ->ByMileage($this->selecmileage)
                        ->ByBody($this->selectedbodystyle)
                        ->ByTransmission($this->selectedtransmission)
                        ->ByDrive($this->selecteddrivetype)
                        ->ByEngine($this->selectedengintype)
                        ->count();
    }

    public function hydrate() {
        $this->updateCount();
    }

    public function updated($propertyName) {
        $this->updateCount();
    }

    public function updateCount() {
        $this->count = Car::ByMake($this->selectedmake)
                        ->ByModel($this->selectedmodel)
                        ->ByYear($this->selecyear)
                        ->ByPrice($this->selecprice)
                        ->ByMileage($this->selecmileage)
                        ->ByBody($this->selectedbodystyle)
                        ->ByTransmission($this->selectedtransmission)
                        ->ByDrive($this->selecteddrivetype)
                        ->ByEngine($this->selectedengintype)
                        ->count();
    }


    public function search() {
        return $this->redirect(route('search',[
                                        'carbrand'=>$this->selectedmake,
                                        'carmodel'=>$this->selectedmodel,
                                        'caryear'=>$this->selecyear,
                                        'carprice'=>$this->selecprice,
                                        'mileage'=>$this->selecmileage,
                                        'carbody'=>$this->selectedbodystyle,
                                        'transmission'=>$this->selectedtransmission,
                                        'drivetype'=>$this->selecteddrivetype,
                                        'engin'=>$this->selectedengintype
                                    ], true));
    }



    public function render(){
        return view('livewire.home')->with([
            'user' => 'saeed',
            'brands'    => $this->brands,
            'models'    => $this->models,
            'count'   => $this->count

        ])->title('Home')->layout('components.layouts.app');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class Carmake extends Component
{
    public $slug;
    public $carbrand;
    public function mount($slug) {
        $this->carbrand= Carmake::where('slug', $slug);
    }
    public function render()
    {
        return view('livewire.carmake');
    }
}

<?php

namespace App\View\Components\filters;

use App\Models\Carmake as ModelsCarmake;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Carmake extends Component
{
    /**
     * Create a new component instance.
     */
    public $carmake;
    public function __construct($carmake = null)
    {
        $this->carmake = $carmake ?? ModelsCarmake::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.filters.carmake');
    }
}

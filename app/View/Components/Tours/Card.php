<?php

namespace App\View\Components\Tours;

use Illuminate\View\Component;
use App\Models\Tours\Tour;

class Card extends Component
{
    public $tour;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Tour $tour)
    {
        $this->tour = $tour;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tours.card');
    }
}

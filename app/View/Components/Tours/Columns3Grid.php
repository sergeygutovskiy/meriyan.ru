<?php

namespace App\View\Components\Tours;

use Illuminate\View\Component;

class Columns3Grid extends Component
{
    public $tours;
    public $max;
    public $centered;
    public $is_with_price;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tours, $isWithPrice = false, $max = null, $centered = false,)
    {
        $this->tours = $tours;
        $this->max = $max;
        $this->centered = $centered;
        $this->is_with_price = $isWithPrice;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tours.columns-3-grid');
    }
}

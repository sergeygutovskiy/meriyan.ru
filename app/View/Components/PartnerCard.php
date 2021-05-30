<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PartnerCard extends Component
{
    public $name;
    public $image;
    public $paragraph;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $image, $paragraph)
    {
        $this->name = $name;
        $this->image = $image;
        $this->paragraph = $paragraph;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.partner-card');
    }
}

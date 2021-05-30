<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AboutPointCard extends Component
{
    public $title;
    public $image;
    public $paragraph;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $image, $paragraph)
    {
        $this->title = $title;
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
        return view('components.about-point-card');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReviewCard extends Component
{
    public $tour_image;
    public $tour_title;
    public $paragraph;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tourImage, $tourTitle, $paragraph)
    {
        $this->tour_image = $tourImage;
        $this->tour_title = $tourTitle;
        $this->paragraph = $paragraph;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.review-card');
    }
}

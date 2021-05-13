<?php

namespace App\View\Components\Tours;

use Illuminate\View\Component;

class Card extends Component
{
    public $img;
    public $title;
    public $desc;
    public $tags;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($img, $title, $desc, $tags)
    {
        $this->img = $img;
        $this->title = $title;
        $this->desc = $desc;
        $this->tags = $tags;
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

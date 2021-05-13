<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Banner extends Component
{
    public $title;
    public $desc;
    public $img;
    public $link_text;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $desc, $img, $linkText)
    {
        $this->title = $title;
        $this->desc = $desc;
        $this->img = $img;
        $this->link_text = $linkText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.banner');
    }
}

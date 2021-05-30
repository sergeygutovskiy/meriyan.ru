<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ContactCard extends Component
{
    public $name;
    public $image;
    public $paragraph;
    public $email;
    public $phone;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $image, $paragraph, $email, $phone)
    {
        $this->name = $name;
        $this->image = $image;
        $this->paragraph = $paragraph;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.contact-card');
    }
}

<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class FormSection extends Component
{
    public $title;
    public $paragraph;
    public $is_green;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $paragraph, $isGreen = false)
    {
        $this->title = $title;
        $this->paragraph = $paragraph;
        $this->is_green = $isGreen;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.form-section');
    }
}

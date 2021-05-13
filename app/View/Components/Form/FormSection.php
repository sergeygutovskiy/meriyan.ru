<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class FormSection extends Component
{
    public $title;
    public $paragraph;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $paragraph)
    {
        $this->title = $title;
        $this->paragraph = $paragraph;
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

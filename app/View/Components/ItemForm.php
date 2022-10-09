<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ItemForm extends Component
{
    public $categories;
    public $status;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $status)
    {
        $this->categories = $categories;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.item-form');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ItemForm extends Component
{
    public $categories;
    public $status;
    public $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($categories, $status, $item)
    {
        $this->categories = $categories;
        $this->status = $status;
        $this->item = $item;

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

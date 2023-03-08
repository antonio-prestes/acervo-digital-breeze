<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CollectionItem extends Component
{
    public $item;
    public $shareButtons;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item, $shareButtons)
    {
        $this->item = $item;
        $this->shareButtons = $shareButtons;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.collection-item');
    }
}

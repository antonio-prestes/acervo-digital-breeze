<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CollectionList extends Component
{
    public $collection;
    public $categories;
    public $categoryCounts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($collection, $categories, $categoryCounts)
    {
        $this->collection = $collection;
        $this->categories = $categories;
        $this->categoryCounts = $categoryCounts;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.collection-list');
    }
}

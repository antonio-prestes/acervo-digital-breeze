<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UsersTable extends Component
{
    public $users;
    public $itens;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($users, $itens)
    {
        $this->users = $users;
        $this->itens = $itens;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.users-table');
    }
}

<?php

namespace Modules\Ladmin\View\Components;

use Illuminate\View\Component;

class MenuSidebar extends Component
{

    public $menus;

    public $permissions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menus = ladmin()->menu()->all();

        $this->permissions = auth()->user()->permissions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return ladmin()->component('layouts.menu-sidebar');
    }
}

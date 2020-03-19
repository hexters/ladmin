<?php

namespace Hexters\Ladmin\Components\Menus;

use Illuminate\View\Component;
use Hexters\Ladmin\Helpers\Menu;

class Toprightmenu extends Component {

    public $menu;
    public $permissions;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Menu $menu) {
        $this->menu = $menu;
        $this->permissions = auth()->user()->permission ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render() {
      
        return view('ladmin::components.menus.top_right_menu');
    }
}

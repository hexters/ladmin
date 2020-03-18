<?php

namespace Hexters\Ladmin\Components\Menus;

use Illuminate\View\Component;

class Sidebar extends Component {


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render() {
      
        return view('ladmin::components.menus.sidebar');
    }
}

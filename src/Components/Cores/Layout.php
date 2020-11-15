<?php

namespace Hexters\Ladmin\Components\Cores;

use Illuminate\View\Component;

class Layout extends Component {

    public $ladminUser;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
      $this->ladminUser = auth()->user();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('ladmin::layouts.app');
    }
}

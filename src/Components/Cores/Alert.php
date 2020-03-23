<?php

namespace Hexters\Ladmin\Components\Cores;

use Illuminate\View\Component;

class Alert extends Component {

    public $status;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
      $this->status = ['success', 'danger', 'info', 'warning'];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('ladmin::components.cores.alert');
    }
}

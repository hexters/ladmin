<?php

namespace Modules\Ladmin\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    public $types;

    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($calss = null)
    {
        $this->class = $calss;
        $this->types = [
            'warning',
            'danger',
            'info',
            'success'
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return ladmin()->component('alert');
    }
}

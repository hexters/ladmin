<?php

namespace Modules\Ladmin\View\Components;

use Illuminate\View\Component;

class DataTables extends Component
{

    public $options;

    public $headers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $options = [], $headers = [] )
    {   
        $this->options = $options;
        $this->headers = $headers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return ladmin()->component('data-tables');
    }
}

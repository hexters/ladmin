<?php

namespace Hexters\Ladmin\Components\Components;

use Illuminate\View\Component;

class Datatables extends Component {
    
    public $fields;
    public $options;
    public $buttons;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($fields, $options) {
        $this->fields = $fields ?? [];
        $this->buttons = $buttons = null;
        $this->options = $options ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('ladmin::components.components.datatables');
    }
}

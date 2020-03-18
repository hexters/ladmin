<?php

namespace Hexters\Ladmin\Components;

use Illuminate\View\Component;

class Input extends Component {

    public $label;
    public $name;
    public $type;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type, $value = null, $label = null) {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render() {
        return view('ladmin::components.input');
    }
}

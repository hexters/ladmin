<?php

namespace Hexters\Ladmin\Components\Components;

use Illuminate\View\Component;

class Input extends Component {

    public $label;
    public $name;
    public $type;
    public $value;
    public $placeholder;
    public $required;
    public $old;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type, $value = null, $label = null, $placeholder = null, $required = false, $old = false, $class = null) {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->old = $old;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render() {
        return view('ladmin::components.components.input');
    }
}

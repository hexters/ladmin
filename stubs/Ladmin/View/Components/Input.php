<?php

namespace Modules\Ladmin\View\Components;

use Illuminate\View\Component;

class Input extends Component
{

    public $label;

    public $name;

    public $placeholder;

    public $readonly;

    public $disabled;

    public $value;

    public $type;

    public $id;

    public $required;

    public $help;

    public $row = [];

    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'text', $id = null,  $label = null, $name = null, $placeholder = null, $readonly = null, $disabled = null, $value = null, $required = null, $help = null, $class = null, $row = [])
    {
        $this->label = is_array($label) ? $label :  (is_null($label) ? null : [$label]);
        $this->type = $type;
        $this->id = $id ?? uniqid();
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
        $this->value = $value;
        $this->required = $required;
        $this->help = $help;
        $this->row = $row;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return ladmin()->component('input.input');
    }
}

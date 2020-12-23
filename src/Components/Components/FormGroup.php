<?php

namespace Hexters\Ladmin\Components\Components;

use Illuminate\View\Component;

class FormGroup extends Component
{
    public $label;
    public $name;
    public $type;
    public $colInput;
    public $colLabel;
    public $help;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $colInput = 8, $help = null, $colLabel = 4, $type = 'horizontal') {
        $this->label = $label;
        $this->name = $name;
        $this->type = $type;
        $this->colInput = $colInput;
        $this->colLabel = $colLabel;
        $this->help = $help;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('ladmin::components.components.form-group');
    }
}

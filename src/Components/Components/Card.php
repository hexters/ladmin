<?php

namespace Hexters\Ladmin\Components\Components;

use Illuminate\View\Component;

class Card extends Component {

    public $title;
    
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = null, $title = null) {
        $this->class = $class;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('ladmin::components.components.card');
    }
}

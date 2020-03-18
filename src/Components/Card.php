<?php

namespace Hexters\Ladmin\Components;

use Illuminate\View\Component;

class Card extends Component {

    public $title = null;
    
    public $class;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('ladmin::components.card');
    }
}

<?php

namespace Modules\Ladmin\View\Components;

use Illuminate\View\Component;

class Select extends Component
{

    public $value = '';

    public $options = [];

    public $empty = '';

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $value = '', $options = [], $empty = null )
    {
        $this->value = $value;
        $this->options = $options;
        $this->empty = $empty ?? '- Options not available -';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return ladmin()->component('select');
    }
}

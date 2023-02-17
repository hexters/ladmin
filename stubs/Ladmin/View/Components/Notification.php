<?php

namespace Modules\Ladmin\View\Components;

use Illuminate\View\Component;

class Notification extends Component
{

    public $user;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $user )
    {
        $this->user = $user;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return ladmin()->component('notification');
    }
}

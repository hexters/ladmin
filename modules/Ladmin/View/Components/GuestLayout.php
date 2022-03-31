<?php

namespace Modules\Ladmin\View\Components;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    
    public $metaTitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $metaTitle = null )
    {
        $this->metaTitle = $metaTitle ?? config('app.name');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return ladmin()->component('layouts.guest-layout');
    }
}

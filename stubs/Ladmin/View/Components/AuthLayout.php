<?php

namespace Modules\Ladmin\View\Components;

use Illuminate\View\Component;

class AuthLayout extends Component
{
    public $metaTitle;

    public $user;

    public $permissions;

    public $role;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $metaTitle = null )
    {
        $this->metaTitle = $metaTitle ?? 'Administrator | ' . config('app.name');
        $this->user = auth()->user();
        $this->permissions = [];
        $this->role = implode(',', $this->user->roles()->pluck('name')->toArray());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return ladmin()->component('layouts.auth-layout');
    }
}

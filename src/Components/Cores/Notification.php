<?php

namespace Hexters\Ladmin\Components\Cores;

use Illuminate\View\Component;

class Notification extends Component {

    public $notifications;
    public $total;

    public $badge;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
      $user = auth()->user();
      $this->notifications = $user->unreadNotifications()->latest()->take(10)->get();
      $this->total = $user->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('ladmin::components.cores.notification');
    }
}

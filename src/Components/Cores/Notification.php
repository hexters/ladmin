<?php

namespace Hexters\Ladmin\Components\Cores;

use Illuminate\View\Component;
use Hexters\Ladmin\Models\LadminNotification;

class Notification extends Component {

    public $notifications;

    public $badge;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
      $this->notifications = LadminNotification::whereNull('read_at')->orderby('id', 'DESC')->limit(10)->get();
      $this->badge = LadminNotification::whereNull('read_at')->limit(10)->count();
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

<?php

namespace Hexters\Ladmin\Listeners;

use Hexters\Ladmin\Events\LadminResetPasswordEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LadminResetPasswordListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Hexters\Ladmin\Events\LadminResetPasswordEvent $event
     * @return void
     */
    public function handle(LadminResetPasswordEvent $event)
    {
        $data = [
            'ip' => request()->ip(),
            'User Agent' => request()->userAgent(),
        ];

        $event->user->activities()->create([
            'loggable_type' => get_class($event->user),
            'loggable_id' => $event->user->id,
            'new_data' => $data,
            'old_data' => [],
            'type' => 'reset-password',
        ]);
    }
}

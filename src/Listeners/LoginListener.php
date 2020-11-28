<?php

namespace Hexters\Ladmin\Listeners;

use Hexters\Ladmin\Exceptions\LadminException;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event) {
        
        try {
            $user = $event->user;
            $new_data = (Object) [
                'ip' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            ];
            
            DB::table('ladmin_logables')->insert([
                'user_id' => $user->id,
                'new_data' => json_encode($new_data),
                'logable_type' => get_class($user),
                'logable_id' => $user->id,
                'old_data' => '[]',
                'type' => 'login',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        } catch (LadminException $e) {}
    }
}

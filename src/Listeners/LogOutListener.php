<?php

namespace Hexters\Ladmin\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Hexters\Ladmin\Exceptions\LadminException;
use Illuminate\Support\Facades\DB;

class LogOutListener
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
    public function handle($event) {

        if(! request()->has('email')) return;

        $user = app(config('ladmin.user'))->where('email', request()->get('email'))->first();
        
        if(is_null($user)) return;

        try {
            $new_data = [
                'ip' => $_SERVER['REMOTE_ADDR'],
                'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            ];
            
            DB::table('ladmin_logables')->create([
                'user_id' => $user->id,
                'new_data' => json_encode($new_data),
                'logable_type' => get_class($user),
                'logable_id' => $user->id,
                'old_data' => '[]',
                'type' => 'logout',
                'state'
            ]);
        } catch (LadminException $e) {}


    }
}

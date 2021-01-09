<?php

namespace Hexters\Ladmin\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Hexters\Ladmin\Notifications\AdminNotification;

class PrccessNotificationJob implements ShouldQueue {

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
     * Data from notification
     *
     * @var [Array]
     */
    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Array $data) {
        
        $this->data = $data;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $admins = app( config('ladmin.user') );
        $admins->chunk(100, function($users) {
            $users->each(function($user) {
              
              if(method_exists($user, 'notify')) {
                if(is_null($this->data['gates']) || $user->can($this->data['gates'])) {
                  $user->notify(new AdminNotification($this->data));
                }
              }
    
            });
        });

    }
}

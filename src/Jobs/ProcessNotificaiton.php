<?php

namespace Hexters\Ladmin\Jobs;

use Hexters\Ladmin\Notifications\LadminNotificaiton;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Auth\User;

class ProcessNotificaiton implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, ?User $user = null)
    {
        $this->user = $user;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        /**
         * Send to spesific user account
         */
        if ($this->user) {
            if (method_exists($this->user, 'notify')) {
                if ($this->user->can(($this->data['gates'] ?? []))) {
                    $this->user->notify(new LadminNotificaiton($this->data));
                }
            }
        } else {
            /**
             * Send to all user accounts
             */
            $class = ladmin()->admin();
            if (method_exists($class, 'notify')) {
                $class->chunk(500, function ($users) {
                    $users->each(function ($user) {
                        if ($user->can(($this->data['gates'] ?? []))) {
                            $user->notify(new LadminNotificaiton($this->data));
                        }
                    });
                });
            }
        }
    }
}

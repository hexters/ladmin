<?php

namespace Hexters\Ladmin\Helpers;

use Hexters\Ladmin\Exceptions\LadminNotificationException;
use Hexters\Ladmin\Jobs\ProcessNotificaiton;
use Illuminate\Foundation\Auth\User;

class Notification
{

    /**
     * Notification title
     *
     * @var String
     */
    protected $title;

    /**
     * Notification link
     *
     * @var String
     */
    protected $link;

    /**
     * Notification image link
     *
     * @var String|null
     */
    protected $image_link = null;

    /**
     * Notification description
     *
     * @var String
     */
    protected $description;

    /**
     * Notification gates
     *
     * @var Array|null
     */
    protected $gates = null;


    /**
     * Spesific user account
     *
     * @var \Illuminate\Foundation\Auth\User
     */
    protected $user;


    /**
     * Constructor
     *
     * @param \Illuminate\Foundation\Auth\User|null $user
     */
    public function __construct(?User $user = null)
    {
        $this->user = $user;
    }


    /**
     * Set notificaiton title
     *
     * @param String $title
     * @return void
     */
    public function setTitle(String $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Set notification link
     *
     * @param String $link
     * @return void
     */
    public function setLink(String $link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * Set notification image link url
     *
     * @param String $image_link
     * @return void
     */
    public function setImageLink(String $image_link)
    {
        $this->image_link = $image_link;
        return $this;
    }

    /**
     * Set notification description
     *
     * @param String $description
     * @return void
     */
    public function setDescription(String $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Set notification gates
     *
     * @param [type] $gates
     * @return void
     */
    public function setGates($gates)
    {

        if (is_array($gates)) {
            $this->gates = $gates;
        } else if (is_string($gates)) {
            $this->gates = [$gates];
        }

        return $this;
    }

    /**
     * Process notification
     *
     * @return void
     */
    public function send()
    {
        $user = $this->user ? $this->user : ladmin()->admin();
        if (!method_exists($user, 'notify')) {
            throw new LadminNotificationException(get_class($user) . ' class does not support sending notifications. Please visit the documentation https://laravel.com/docs/master/notifications#using-the-notifiable-trait');
        }

        if (empty($this->title)) {
            throw new LadminNotificationException('Notification title is required');
        }

        if (empty($this->link)) {
            throw new LadminNotificationException('Notification link is required');
        }

        if (empty($this->description)) {
            throw new LadminNotificationException('Notification description is required');
        }

        if (is_null($this->gates) || count($this->gates) < 1 || empty($this->gates)) {
            $this->gates = ladmin()->menu()->allGates();
        }
        
        dispatch(new ProcessNotificaiton([
            'title' => $this->title,
            'link' => $this->link,
            'image_link' => $this->image_link,
            'description' => $this->description,
            'gates' => $this->gates
        ], $this->user));

        return [
            'message' => 'Notifications will be sent immediately to ' . ($this->user->name ?? 'user'),
        ];
    }
}

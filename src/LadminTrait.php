<?php

namespace Hexters\Ladmin;

use App\Models\Role;
use Hexters\Ladmin\Exceptions\LadminException;
use Hexters\Ladmin\Models\LadminNotification;
use Hexters\Ladmin\Notifications\ResetPasswordNotification;
use Hexters\Ladmin\Events\LadminNotificationEvent;

trait LadminTrait {

  /**
   * Roles
   *
   * @return Collection
   */
  public function roles() {
    return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id', 'id', 'id');
  }

  /**
   * Get role first
   *
   * @return Collection
   */
  public function getRoleAttribute() {
    return $this->roles()->first();
  }

  /**
   * List of permissions
   *
   * @return void
   */
  public function getPermissionAttribute() {
    $permissions = [];
    foreach($this->roles as $role) {
      $gates = $role->gates ?? [];
      foreach($gates as $gate) {
        if(!in_array($gate, $permissions)) {
          $permissions[] = $gate;
        }
      }
    }
    return $permissions;
  }
  
  /**
   * Notification model
   *
   * @return Model
   */
  public function getLadminNotificationsAttribute() {
    return new LadminNotification;
  }

  /**
   * Unread notification
   *
   * @return void
   */
  public function getLadminNotificationUnreadAttribute() {
    return LadminNotification::whereNull('read_at');
  }

  /**
   * Readed function notification
   *
   * @param [Integer] $id
   * @return Boolean
   */
  public function makeReadedLadminNotification($id) {
    try {
      return LadminNotification::find($id)->update([
        'read_at' => now()
      ]);
    } catch (LadminException $e) {}
  }

  public function ladminSendNotification($option) {
    try {
      if(empty($option['title'])) {
        throw new \Exception('Title required');
      }
      if(empty($option['link'])) {
        throw new \Exception('Link required');
      }
      if(empty($option['description'])) {
        throw new \Exception('Description required');
      }
      
      $notification = LadminNotification::create([
        'title' => $option['title'],
        'link' => $option['link'],
        'image_link' => ($option['image_link'] ?? null),
        'description' => $option['description'],
      ]);
      event(new LadminNotificationEvent($notification));
      return [
        'result' => true
      ];
    } catch(\Exception $ex) {
      return [
        'result' => false,
        'message' => $ex->getMessage()
      ];
    } catch (LadminException $e) {}
  }

  /**
   * Send the password reset notification.
   *
   * @param  string  $token
   * @return void
   */
  public function sendPasswordResetNotification($token) {
    $this->notify(new ResetPasswordNotification($token, $this->email));
  }

}
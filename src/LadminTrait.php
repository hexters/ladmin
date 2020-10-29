<?php

namespace Hexters\Ladmin;

use App\Models\Role;
use Hexters\Ladmin\Notifications\ResetPasswordNotification;
use Hexters\Ladmin\Exceptions\LadminException;
use Hexters\Ladmin\Models\LadminNotification;
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
    return LadminNotification::whereNull('read_at')->limit(config('ladmin.notification_limit', 100));
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
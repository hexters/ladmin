<?php

namespace Hexters\Ladmin;

use Hexters\Ladmin\Notifications\ResetPasswordNotification;
use Hexters\Ladmin\Models\Role;

trait LadminTrait {

  public function roles() {
    return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id', 'id', 'id');
  }

  public function getPermissionAttribute() {
    $permissions = [];
    foreach($this->roles as $gate) {
      $gates = $gate->gates ?? [];
      foreach($gates as $gate) {
        if(!in_array($gate, $permissions)) {
          $permissions[] = $gate->gates;
        }
      }
    }
    return $permissions;
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
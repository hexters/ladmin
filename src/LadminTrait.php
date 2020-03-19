<?php

namespace Hexters\Ladmin;

use Hexters\Ladmin\Notifications\ResetPasswordNotification;

trait LadminTrait {

  public function gate() {
    return $this->morphOne('Hexters\Ladmin\Models\LadminGatePermisison', 'permissionable');
  }

  public function getPermissionAttribute() {
    return $this->gate->permission;
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
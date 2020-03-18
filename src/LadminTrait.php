<?php

namespace Hexters\Ladmin;

trait LadminTrait {

  public function gate() {
    return $this->morphOne('Hexters\Ladmin\Models\LadminGatePermisison', 'permissionable');
  }

  public function getPermissionAttribute() {
    return $this->gate->permission;
  }

}
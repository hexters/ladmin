<?php

namespace Hexters\Ladmin;

trait LadminTrait {

  public function permission() {
    return $this->morphOne('Hexters\Ladmin\Models\LadminGatePermisison', 'permissionable');
  }

}
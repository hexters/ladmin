<?php

namespace Hexters\Ladmin;

class LadminTrait {

  public function permission() {
    return $this->morphOne('Hexters\Ladmin\Models\LadminGatePermisison', 'permissionable');
  }

}
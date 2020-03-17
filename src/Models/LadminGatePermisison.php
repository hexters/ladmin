<?php

namespace Hexters\Ladmin\Models;

use Illuminate\Database\Eloquent\Model;

class LadminGatePermisison extends Model {

  protected $table = 'ladmin_gate_permissions';
  protected $fillable = [
    'gate_permission'
  ];
  
  public function permissionable() {
    return $this->morphTo();
  }

}
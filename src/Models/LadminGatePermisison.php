<?php

namespace Hexters\Ladmin\Models;

use Illuminate\Database\Eloquent\Model;

class LadminGatePermisison extends Model {

  protected $table = 'ladmin_permissions';
  protected $fillable = [
    'permission'
  ];

  protected $casts = [
    'permission' => 'array'
  ];
  
  public function permissionable() {
    return $this->morphTo();
  }

}
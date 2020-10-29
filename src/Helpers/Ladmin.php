<?php 

namespace Hexters\Ladmin\Helpers;
use Illuminate\Support\Facades\Gate;

class Ladmin {

  public function notification() {
    return new Notification;
  }

  public function allow($gates) {
    if(Gate::denies('administrator.account.admin.index')) {
      return abort(403);
    }
  }

}
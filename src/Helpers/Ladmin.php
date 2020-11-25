<?php 

namespace Hexters\Ladmin\Helpers;
use Illuminate\Support\Facades\Gate;

class Ladmin {

  public function notification() {
    return new Notification;
  }

  public function allow($gates) {
    if(Gate::denies($gates)) {
      return abort(403);
    }
  }

  public function icon($path) {
    $pathName = str_replace('.', '/', trim($path)) . '.svg';
    $basePath = base_path('/resources/assets/icons/' . $pathName);
    if(file_exists($basePath)) {
      return file_get_contents($basePath);
    }
    return '<i class="' . $path . '"></i>';
  }

}

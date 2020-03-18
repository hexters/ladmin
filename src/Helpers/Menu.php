<?php 

namespace Hexters\Ladmin\Helper;

class Menu {

  public $sidebar = [];
  public $topRright = [];

  public function __construct() {
    $this->sidebar = require(app_path('/Menus/sidebar.php'));
    $this->topRright = require(app_path('/Menus/top_right.php'));
  }

  public function gates($menus) {
    $gates = [];
    $subGates = [];
    foreach($menus as $menu) {
      $gates[] = $menu['gate'];
      foreach($menu['gates'] as $gate) {
        $gates[] = $gate['gate'];
      }
      if(isset($menu['submenus'])) {
        if($this->loopGates($menu['submenus'])) {
          foreach($this->loopGates($menu['submenus']) as $sub) {
            $gates[] = $sub['gate'];
          }
        }
      }
    }
    $result = array_merge($gates, $subGates);
    return $result > 0 ? $result : null;
  }
}
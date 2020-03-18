<?php 

namespace Hexters\Ladmin\Helpers;

class Menu {

  public $menus = [];

  public function __construct() {
    $sidebar = require(app_path('/Menus/sidebar.php'));
    $topRright = require(app_path('/Menus/top_right.php'));
    $this->menus = array_merge($sidebar, $topRright);
  }

  public function gates() {
    $gates = [];
    $subGates = [];
    foreach($this->menus as $menu) {
      $gates[] = $menu['gate'];
      foreach($menu['gates'] as $gate) {
        $gates[] = $gate['gate'];
      }
      if(isset($menu['submenus'])) {
        if($this->gates($menu['submenus'])) {
          foreach($this->gates($menu['submenus']) as $sub) {
            $gates[] = $sub['gate'];
          }
        }
      }
    }
    $result = array_merge($gates, $subGates);
    return $result > 0 ? $result : null;
  }
}
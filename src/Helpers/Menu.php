<?php 

namespace Hexters\Ladmin\Helpers;

class Menu {

  public $menus = [];
  public $sidebar = [];
  public $topRright = [];

  public function __construct() {
    $this->sidebar = require(app_path('/Menus/sidebar.php'));
    $this->topRright = require(app_path('/Menus/top_right.php'));
    $this->menus = array_merge($this->sidebar, $this->topRright);
  }

  public function gates($menus) {
    $gates = [];
    foreach($menus as $menu) {
      $gates[] = $menu['gate'];
      foreach($menu['gates'] as $gate) {
        $gates[] = $gate['gate'];
      }
      if(isset($menu['submenus'])) {
        if($this->gates($menu['submenus'])) {
          foreach($this->gates($menu['submenus']) as $sub) {
            if(!in_array($sub, $gates)) {
              $gates[] = $sub;
            }
          }
        }
      }
    }
    return count($gates) > 0 ? $gates : null;
  }
}
<?php 

namespace Hexters\Ladmin\Helpers;

class Menu {

  public $menus = [];
  public $sidebar = [];
  public $topRright = [];

  public function __construct() {

    if(ladmin()->get_option('menu-sidebar')) {
      $this->sidebar = json_decode( json_encode(ladmin()->get_option('menu-sidebar')), true );
    } else {
      $this->sidebar = file_exists(app_path('/Menus/sidebar.php')) ?  require(app_path('/Menus/sidebar.php')) : [];
    }

    if(ladmin()->get_option('menu-top')) {
      $this->sidebar = json_decode( json_encode(ladmin()->get_option('menu-top')), true );
    } else {
      $this->topRright =  file_exists(app_path('/Menus/top_right.php')) ? require(app_path('/Menus/top_right.php')) : [];
    }

    
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
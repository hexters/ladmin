<?php 

namespace Hexters\Ladmin\DataTables;
use Hexters\Ladmin\Exceptions\LadminException;
use Yajra\DataTables\Datatables as BaseDatatables;

class Datatables extends BaseDatatables {
  
  /**
   * Render blade
   *
   * @param string $blade
   * @param array $data
   * 
   */
  public static function view($blade = 'ladmin::ladmin.index', $data = []) {
    return self::build($blade, $data);
  }

  /**
   * Proccess to render blade anda ajax request
   *
   * @param [String] $blade
   * @param array $data
   * 
   */
  private static function build($blade, $data = []) {
    
    $child = app(get_called_class());

    if(request()->ajax()) {
      if(method_exists($child, 'render')) {
        return $child->render();
      }

      throw new LadminException('No method render found in the class ' . get_called_class());
      
    }
    
    if(method_exists($child, 'options')) {
      $options = array_merge($data, $child->options());
      return view($blade, $options);
    }

    throw new LadminException('No method options found in the class ' . get_called_class());
  }

}
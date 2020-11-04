<?php

namespace Hexters\Ladmin\Components\Cores;

use Illuminate\View\Component;

class Breadcrumb extends Component {

    public $items;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        $items = collect();
        $paths = collect(explode('/', request()->path()));
        $url = '';
        foreach($paths->toArray() as $path) {
          $prefix = config('ladmin.prefix', 'administrator');
          $path = in_array($path, [$prefix]) ? 'Dashboard' : $path;
          $url .= in_array($path, ['Dashboard']) ? '/' . $prefix : "/{$path}";
          $items->push([
            'url' => url($url),
            'name' => $this->isUuid($path) || is_numeric($path) ? 'Details' : $this->name($path)
          ]);
        }
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('ladmin::components.cores.breadcrumb');
    }

    public function name($name) {
      $name = str_replace('-', ' ', $name);
      $name = str_replace('_', ' ', $name);
      return ucwords($name);
    }

    public function isUuid($value) {
      return preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i', $value);
    }
}

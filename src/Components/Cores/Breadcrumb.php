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
          $path = in_array($path, ['administrator']) ? 'Dashboard' : $path;
          if($path && (!$this->isUuid($path) || !is_numeric($path))) {
            $url .= in_array($path, ['Dashboard']) ? '/administrator' : "/{$path}";
            $items->push([
              'url' => url($url),
              'name' => ucwords($path)
            ]);
          }
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

    public function isUuid($value) {
      return preg_match('/[a-f0-9]{8}\-[a-f0-9]{4}\-4[a-f0-9]{3}\-(8|9|a|b)[a-f0-9]{3‌​}\-[a-f0-9]{12}/', $value);
    }
}

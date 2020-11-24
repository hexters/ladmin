@php
    $viewMenu = function($menus) use (&$viewMenu, $permissions) {
        $html = '';
        foreach($menus as $menu) {
            if(in_array($menu['gate'], $permissions)) {
                $html .= view('ladmin::components.menus._partials._sidebar_item', ['menu' => $menu, 'viewMenu' => $viewMenu]);
            }
        }
        return $html;
    }
@endphp

<ul>
  <li class="{{ request()->is(config('ladmin.prefix', 'administrator')) ? 'active' : null }}">
    <a href="{{ route('administrator.index') }}">
      {!! ladmin()->icon('view-boards') !!} Dashboard
    </a>
  </li>

  {!! $viewMenu($menu->sidebar) !!}
</ul>
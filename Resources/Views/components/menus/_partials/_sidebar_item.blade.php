<li class="{{ request()->is( config('ladmin.prefix', 'administrator') . "/" . $menu['isActive']) ? 'active' : null }}" id="{{ $menu['id'] ?? null }}">
  @php 
    $router = 'javascript:void(0);';
    if($menu['route']) {
      $route = $menu['route'][0];
      $params = $menu['route'][1] ?? [];
      $router = route($route, $params);
    }
  @endphp
  <a href="{{ $router }}">
    @if(isset($menu['icon']))
      {!! ladmin()->icon($menu['icon']) !!}
    @endif
    {{ $menu['name'] }}
  </a>

  @if(isset($menu['submenus']))
    <ul>
      {!! $viewMenu($menu['submenus']) !!}
    </ul>
  @endif
</li>


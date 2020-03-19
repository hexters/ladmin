@foreach ($menu->topRright as $menu)
  @if(in_array($menu['gate'], $permissions))
    @php
      $router = 'javascript:void(0);';
      if($menu['route']) {
        $route = $menu['route'][0];
        $params = $menu['route'][1] ?? [];
        $router = route($route, $params);
      }
    @endphp
    <li>
      <a href="{{ $router }}">{{ $menu['name'] }}</a>
    </li>
  @endif
@endforeach
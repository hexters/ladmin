<ul class="ladmin-top-menu-list">
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
  <li>
    <a href="javascript:void(0);" onclick="document.getElementById('ladmin-logout').submit()">Logout</a>
    <form action="{{ route('administrator.logout') }}" id="ladmin-logout" method="post">@csrf</form>
  </li>
</ul>
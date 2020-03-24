@php
  $rand = rand();    
@endphp
<li>
  <input style="vertical-align:top;" type="checkbox" id="{{ $rand }}" {{ in_array($menu['gate'], $permissions) ? 'checked' : null }} name="gates[]" value="{{ $menu['gate'] }}">
  <label for="{{ $rand }}">
    <strong>{{ $menu['name'] ?? $menu['title'] }}</strong>
    @if($menu['description'])
      <p>{{ $menu['description'] ?? null }}</p>
    @endif
  </label>

  @if(isset($menu['submenus']))
    <ul>
      {!! $viewMenu($menu['submenus']) !!}
    </ul>
  @endif

  @if(isset($menu['gates']))
    <ul>
      {!! $viewMenu($menu['gates']) !!}
    </ul>
  @endif
</li>
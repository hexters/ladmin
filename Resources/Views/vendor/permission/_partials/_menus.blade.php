@php
  $rand = rand();    
@endphp
<li style="border-left:solid 1px #ddd;">
  <input class="permission-checkbox" style="vertical-align:top;margin-left:-5px;cursor:pointer;" type="checkbox" id="{{ $rand }}" {{ in_array($menu['gate'], $permissions) ? 'checked' : null }} name="gates[]" value="{{ $menu['gate'] }}">
  <label for="{{ $rand }}" style="cursor:pointer;">
    <strong>{{ $menu['name'] ?? $menu['title'] }}</strong>
    <p class="mb-0 text-muted">{{ $menu['description'] ?? null }}</p>
  </label>

  @if(isset($menu['submenus']))
    <ul>
      {!! $viewMenu($menu['submenus']) !!}
    </ul>
  @endif

  @if(isset($menu['gates']) && count($menu['gates']) > 0)
    <button  style="text-decoration:none; width:90%;" type="button" class="btn ml-4 mb-3  btn-light btn-sm btn-block text-left" data-toggle="collapse" data-target="#collapse-{{ $rand }}">
      <strong>Open Permission <i class="fas fa-caret-down float-right"></i></strong>
    </button>
    <ul class="collapse" id="collapse-{{ $rand }}">
      {!! $viewMenu($menu['gates']) !!}
    </ul>
  @endif
</li>
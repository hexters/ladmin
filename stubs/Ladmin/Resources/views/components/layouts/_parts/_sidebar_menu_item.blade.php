@php
$route = null;
if (isset($menu['routeName'])) {
    $route = Route::has($menu['routeName']) ? route($menu['routeName'], $menu['routeParams'] ?? []) : $menu['routeName'];
}

$type = $menu['type'] ?? 'menu';

@endphp
@if ($type === 'menu')
    <li class="menu-item {{ isset($menu['submenus']) && count($menu['submenus']) > 0 ? 'has-submenu' : null }} {{ request()->is($menu['isActive']) ? 'active' : '' }}"
        id="{{ $menu['id'] ?? null }}">
        <a href="{{ $route }}" target="{{ $menu['target'] }}">
            <i class="{{ $menu['icon'] }}"></i>
            <span class="title">{{ $menu['name'] }}</span>
        </a>

        @if (isset($menu['submenus']) && count($menu['submenus']) > 0)
            <ul>
                {!! $viewMenu($menu['submenus']) !!}
            </ul>
        @endif
    </li>
@else
    <li class="menu-divider">
        @if (is_null($menu['name']) || empty($menu['name']))
            <hr />
        @else
            <div class="px-4 my-3">
                <strong>{{ $menu['name'] }}</strong>
            </div>
        @endif
    </li>
@endif

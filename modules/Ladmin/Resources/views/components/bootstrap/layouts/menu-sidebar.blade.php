@php
$viewMenu = function ($menus) use (&$viewMenu, $permissions) {
    $html = '';
    foreach ($menus as $menu) {
        if (in_array($menu['gate'], $permissions)) {
            $html .= ladmin()->component('layouts._parts._sidebar_menu_item', ['menu' => $menu, 'viewMenu' => $viewMenu]);
        }
    }
    return $html;
};
@endphp

<ul>
    @if (Route::has('ladmin.index'))
        <li class="menu-item {{ Route::is('ladmin.index') ? 'active' : null }}" id="menu-dashboard">
            <a href="{{ route('ladmin.index') }}">
                <i class="fa fa-solid fa-table-columns"></i>
                <span class="title">Dashboard</span>
            </a>
        </li>
    @endif
    {!! $viewMenu( ladmin()->menu()->all(), false ) !!}
</ul>

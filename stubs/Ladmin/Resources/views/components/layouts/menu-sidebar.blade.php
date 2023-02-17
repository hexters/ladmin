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
    {!! $viewMenu( ladmin()->menu()->all(), false ) !!}
</ul>

<?php

namespace Hexters\Ladmin\Helpers;

use Hexters\Ladmin\Contracts\MenuDivider;

class Menu
{

    protected $menus;

    public function __construct()
    {
        if (file_exists(app_path('Menu/Sidebar.php'))) {
            $this->menus = require(app_path('/Menu/Sidebar.php'));
        } else {
            $this->menus = [];
        }
    }

    public function all()
    {
        return $this->render();
    }

    public function allGates()
    {
        return $this->parse_gates(
            $this->render()
        );
    }

    protected function parse_gates($menus)
    {

        $gates = [];
        foreach ($menus as $menu) {
            $gates[] = $menu['gate'];

            if (isset($menu['gates'])) {
                foreach ($menu['gates'] as $gate) {
                    $gates[] = $gate['gate'];
                }
            }

            if (isset($menu['submenus']) && count($menu['submenus']) > 0) {
                $gates = array_merge($gates, $this->parse_gates($menu['submenus']));
            }
        }

        return $gates;
    }

    protected function render()
    {
        $menus = [];
        foreach ($this->menus as $menu) {
            if (file_exists(base_path(str_replace('\\', '/', $menu) . '.php'))) {
                $menuClass = app($menu);
                if (($menuClass instanceof MenuDivider)) {
                    $menus[] = $menuClass->divider();
                } else {
                    $menus[] = $menuClass->render();
                }
            }
        }
        return $menus;
    }
}

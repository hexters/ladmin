<?php

namespace Modules\Ladmin\Menus;

use Ladmin\Engine\Menus\Gate;
use Ladmin\Engine\Supports\BaseMenu;
use Modules\Ladmin\Menus\Submenus\Permission;
use Modules\Ladmin\Menus\Submenus\Role;

class Access extends BaseMenu
{

    /**
     * Gate of default menu
     *
     * @var string
     */
    protected $gate = 'access.index';

    /**
     * Menu title
     *
     * @var string
     */
    protected $name = 'Access';

    /**
     * Menu Font icon
     *
     * @var string
     */
    protected $icon = 'fa-solid fa-user-lock'; // fontawesome

    /**
     * Menu Description
     *
     * @var string
     */
    protected $description = 'User can access menu account';

    /**
     * Status active menu
     *
     * @var string
     */
    protected $isActive = '';

    /**
     * Menu ID
     *
     * @var string
     */
    protected $id = '';

    /**
     * Route name
     *
     * @return Array|null
     * @example ['route.name', ['uuid', 'foo' => 'bar']]
     */
    protected function route(): ?array
    {
        return null;
    }

    /**
     * Other gates
     *
     * @return Array(Ladmin\Engine\Menus\Gate)
     */
    protected function gates()
    {
        return [
            // new Gate(gate: 'gate.menu.uniq', title: 'Gate Title', description: 'Description of gate'),
        ];
    }

    /**
     * Submenu
     *
     * @return void
     */
    protected function submenus()
    {
        return [

            Role::class,

        ];
    }
}

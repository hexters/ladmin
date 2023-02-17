<?php

namespace Modules\Ladmin\Menus\Submenus;

use Ladmin\Engine\Menus\Gate;
use Ladmin\Engine\Supports\BaseMenu;

class Role extends BaseMenu
{

    /**
     * Gate of default menu
     *
     * @var string
     */
    protected $gate = 'role.index';

    /**
     * Menu title
     *
     * @var string
     */
    protected $name = 'Role & Permission';

    /**
     * Menu Font icon
     *
     * @var string
     */
    protected $icon = null;

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
    protected $isActive = 'role*';

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
        return ['ladmin.role.index'];
    }

    /**
     * Other gates
     *
     * @return Array(Ladmin\Engine\Menus\Gate)
     */
    protected function gates()
    {
        return [
            new Gate(gate: 'role.assign', title: 'Assign Permission', description: 'User can assign role to permissions'),
            new Gate(gate: 'role.create', title: 'Create new Role', description: 'User can create new role'),
            new Gate(gate: 'role.update', title: 'Update Role', description: 'User can update role'),
            new Gate(gate: 'role.destroy', title: 'Delete Role', description: 'User can delete role'),
        ];
    }

    /**
     * Submenu
     *
     * @return void
     */
    protected function submenus()
    {
        return [];
    }
}

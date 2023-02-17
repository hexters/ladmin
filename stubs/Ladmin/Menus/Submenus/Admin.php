<?php

namespace Modules\Ladmin\Menus\Submenus;

use Ladmin\Engine\Menus\Gate;
use Ladmin\Engine\Supports\BaseMenu;

class Admin extends BaseMenu
{

    /**
     * Gate of default menu
     *
     * @var string
     */
    protected $gate = 'ladmin.admin.index';

    /**
     * Menu title
     *
     * @var string
     */
    protected $name = 'Admin';

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
    protected $isActive = 'admin*';

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
        return ['ladmin.admin.index'];
    }

    /**
     * Other gates
     *
     * @return Array(Ladmin\Engine\Menus\Gate)
     */
    protected function gates()
    {
        return [
            new Gate(gate: 'ladmin.admin.create', title: 'Create New Admin', description: 'User can create new admin account'),
            new Gate(gate: 'ladmin.admin.update', title: 'Update Admin', description: 'User can update admin account'),
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

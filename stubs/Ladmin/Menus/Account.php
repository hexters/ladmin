<?php

namespace Modules\Ladmin\Menus;

use Ladmin\Engine\Menus\Gate;
use Ladmin\Engine\Supports\BaseMenu;
use Modules\Ladmin\Menus\Submenus\Admin;

class Account extends BaseMenu
{

    /**
     * Gate of default menu
     *
     * @var string
     */
    protected $gate = 'account.index';

    /**
     * Menu title
     *
     * @var string
     */
    protected $name = 'Account';

    /**
     * Menu Font icon
     *
     * @var string
     */
    protected $icon = 'fa-solid fa-user-group'; // fontawesome

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
    protected $id = 'badge';

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
            // new Gate(gate: 'menu.uniq.gate', title: 'Gate Title', description: 'Description of gate'),
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

            Admin::class,

        ];
    }
}

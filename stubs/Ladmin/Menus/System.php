<?php

namespace Modules\Ladmin\Menus;

use Ladmin\Engine\Supports\BaseMenu;
use Ladmin\Engine\Menus\Gate;
use Modules\Ladmin\Menus\Submenus\SystemLog;
use Modules\Ladmin\Menus\Submenus\UserActivity;

class System extends BaseMenu
{

    /**
     * Gate name for accessing module
     *
     * @var string
     */
    protected $gate = 'system.index';

    /**
     * Name of menu
     *
     * @var string
     */
    protected $name = 'System';

    /**
     * Font icons 
     *
     * @var string
     */
    protected $icon = 'fa-solid fa-gears'; // fontawesome

    /**
     * Menu description
     *
     * @var string
     */
    protected $description = 'User can access module system';

    /**
     * Inspecting The Request Path / Route active
     * https://laravel.com/docs/master/requests#inspecting-the-request-path
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
     * Other menus
     *
     * @return void
     */
    protected function submenus()
    {
        return [
            UserActivity::class,
            SystemLog::class,
        ];
    }
}

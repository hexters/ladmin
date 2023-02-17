<?php

namespace Modules\Ladmin\Menus\Submenus;

use Ladmin\Engine\Menus\Gate;
use Ladmin\Engine\Supports\BaseMenu;

class SystemLog extends BaseMenu
{

    /**
     * Gate name for accessing module
     *
     * @var string
     */
    protected $gate = 'system.log.index';

    /**
     * Name of menu
     *
     * @var string
     */
    protected $name = 'System Log';

    /**
     * Font icons 
     *
     * @var string
     */
    protected $icon = null; // fontawesome

    /**
     * Menu description
     *
     * @var string
     */
    protected $description = 'User can access system log';

    /**
     * Inspecting The Request Path / Route active
     * https://laravel.com/docs/master/requests#inspecting-the-request-path
     *
     * @var string
     */
    protected $isActive = 'systemlog*';

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
        return ['ladmin.systemlog.index'];
    }

    /**
     * Other gates
     *
     * @return Array(Ladmin\Engine\Menus\Gate)
     */
    protected function gates()
    {
        return [
            new Gate(gate: 'system.log.show', title: 'View details', description: 'User can view details'),
            new Gate(gate: 'system.log.destroy', title: 'Delete Log', description: 'User can delete log file'),
        ];
    }

    /**
     * Other menus
     *
     * @return void
     */
    protected function submenus()
    {
        return [];
    }
}

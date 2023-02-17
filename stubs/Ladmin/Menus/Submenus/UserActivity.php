<?php

namespace Modules\Ladmin\Menus\Submenus;

use Ladmin\Engine\Menus\Gate;
use Ladmin\Engine\Supports\BaseMenu;

class UserActivity extends BaseMenu
{

    /**
     * Gate name for accessing module
     *
     * @var string
     */
    protected $gate = 'user.activity.index';

    /**
     * Name of menu
     *
     * @var string
     */
    protected $name = 'User Activity';

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
    protected $description = 'User can access user activity';

    /**
     * Inspecting The Request Path / Route active
     * https://laravel.com/docs/master/requests#inspecting-the-request-path
     *
     * @var string
     */
    protected $isActive = 'activities*';

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
        return ['ladmin.activities.index'];
    }

    /**
     * Other gates
     *
     * @return Array(Ladmin\Engine\Menus\Gate)
     */
    protected function gates()
    {
        return [
            new Gate(gate: 'user.activity.show', title: 'View details', description: 'User can view details'),
            new Gate(gate: 'user.activity.destroy', title: 'Delete record', description: 'User can delete user activity'),
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
            // OtherMenu::class
        ];
    }
}

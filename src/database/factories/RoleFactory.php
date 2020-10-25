<?php

namespace Database\Factories;

use App\Models\Role;
use Hexters\Ladmin\Helpers\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $menu = new Menu;
        return [
            'name' => 'Super Admin',
            'gates' => $menu->gates($menu->menus) ?? []
        ];
    }
}

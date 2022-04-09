<?php

namespace Modules\Ladmin\Databases\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Ladmin\Models\LadminRole;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Create role
         */
        $role = LadminRole::first();
        if (!$role) {
            $role = LadminRole::create([
                'name' => 'Super Admin',
                'gates' => ladmin()->menu()->allGates()
            ]);
        }

        /**
         * Create dummy ladmin account 
         */
        \Modules\Ladmin\Models\Admin::factory(10)->create()
            ->each(function ($admin) use ($role) {
                $admin->roles()->sync([$role->id]);
            });
    }
}

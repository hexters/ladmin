<?php

namespace Modules\Ladmin\Databases\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Ladmin\Models\LadminRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!LadminRole::count()) {
            $role = LadminRole::create([
                'name' => 'Super Admin',
                'gates' => ladmin()->menu()->allGates()
            ]);

            ladmin()->admin()->each( fn ( $user ) => $user->roles()->attach($role));

        }
    }
}

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

        $this->command->line('');
        $this->command->info('# Login Accounts');
        $this->command->line('');
        $this->command->line('View complete account in `' . ladmin()->getAdminTable() . '` table in your database.');
        $this->command->line('');

        /**
         * Create dummy ladmin account 
         */
        \Modules\Ladmin\Models\Admin::factory(3)->create()
            ->each(function ($admin) use ($role) {
                $admin->roles()->sync([$role->id]);

                $this->command->line('--------------------------------------------');
                $this->command->info('email     : ' . $admin->email);
                $this->command->info('password  : password');
            });
    }
}

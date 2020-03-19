<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Hexters\Ladmin\Helpers\Menu;
use Hexters\Ladmin\Model\Role;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('gates')->nullable();
            $table->timestamps();
        });

        // Insert for first data
        $menu = new Menu;
        Role::create([
            'name' => 'Super Admin',
            'gates' => $menu->gates($menu->menus)
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}

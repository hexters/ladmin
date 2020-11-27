<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLadminLogablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('ladmin_logables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->morphs('logable');
            $table->longText('new_data');
            $table->longText('old_data');
            $table->string('type')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ladmin_logables');
    }
}

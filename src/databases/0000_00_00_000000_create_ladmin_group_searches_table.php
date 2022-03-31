<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ladmin_group_searches', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->morphs('searchable');
            $table->text('target')->nullable();
            $table->text('gates')->nullable();
            $table->string('title')->fulltext();
            $table->string('description')->fulltext();
            $table->text('link_details')->nullable();
            $table->string('group')->fulltext();
            $table->longText('data')->fulltext();
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
        Schema::dropIfExists('ladmin_group_searches');
    }
};

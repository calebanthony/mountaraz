<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('champions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->integer('health');
            $table->timestamps();
        });

        Schema::create('abilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('champion_id');
            $table->string('name');
            $table->string('hotkey');
            $table->decimal('cooldown', 4, 2);
            $table->integer('energy_cost');
            $table->integer('energy_gain');
            $table->decimal('cast_time', 4, 2);
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('ability_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ability_id');
            $table->string('type1');
            $table->string('type2')->nullable();
            $table->string('type3')->nullable();
            $table->timestamps();
        });

        Schema::create('ability_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ability_id');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('battlerites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('champion_id');
            $table->string('name');
            $table->string('description');
            $table->string('type');
            $table->string('skill');
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
        Schema::dropIfExists('champions');
        Schema::dropIfExists('abilities');
        Schema::dropIfExists('ability_types');
        Schema::dropIfExists('ability_details');
        Schema::dropIfExists('battlerites');
    }
}

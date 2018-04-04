<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * No relationships defined in the database
         */
        Schema::create('heroes', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });

        /**
         * No relationships defined in the database
         */
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('label');
            $table->text('notes');
            $table->boolean('is_done');
            $table->softDeletes();
            $table->timestamps();

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedInteger('hero_id')->index()->nullable();
            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
        Schema::dropIfExists('heroes');
    }
}

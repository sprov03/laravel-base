<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        /**
         * Belongs To and has Many
         */
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('form_field_types', function (Blueprint $table) {
            $table->string('name')->primary();
        });

        Schema::create('form_fields', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('form_id')->index();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');

            $table->string('form_field_type')->index();
            $table->foreign('form_field_type')->references('name')->on('form_field_types')->onDelete('cascade');
        });

        /**
         * Many to many
         */
        Schema::create('form_site', function (Blueprint $table) {
            $table->unsignedInteger('site_id')->index();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');

            $table->unsignedInteger('form_id')->index();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');

            $table->primary(['site_id', 'form_id']);
        });

        /**
         * Polymorphic MorphTo
         * website type
         */
        Schema::table('sites', function (Blueprint $table) {
            $table->unsignedInteger('website_id')->index();
            $table->string('website_type', '50')->index();
        });
        Schema::create('buying_websites', function (Blueprint $table) {
            $table->increments('id');
        });
        Schema::create('selling_websites', function (Blueprint $table) {
            $table->increments('id');
        });

        /**
         * Polymorphic MorphToMany
         * Forms & sites
         */
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('subject_id')->index();
            $table->string('subject_type')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
        Schema::dropIfExists('selling_websites');
        Schema::dropIfExists('buying_websites');
        Schema::dropIfExists('form_site');
        Schema::dropIfExists('form_fields');
        Schema::dropIfExists('form_field_types');
        Schema::dropIfExists('forms');
        Schema::dropIfExists('sites');
        Schema::dropIfExists('users');
    }
}

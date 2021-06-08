<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 40);
            $table->string('email')->unique('users_email_unique');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('phonenumber')->nullable();
            $table->enum('rol', ['root', 'advanced', 'operator', 'user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->mediumblob('profilepic')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('city_id', 'users_city_id_foreign')->references('id')->on('cities');
            $table->foreign('country_id', 'users_country_id_foreign')->references('id')->on('countries');
            $table->foreign('state_id', 'users_state_id_foreign')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

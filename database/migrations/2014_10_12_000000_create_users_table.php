<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(User::TABLA, function (Blueprint $table) {
            $table->id();
            $table->string('username', 40);
            $table->string('email')->unique();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('phonenumber')->nullable();
            $table->enum('rol', ['root', 'advanced', 'operator', 'user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->binary('profilepic')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('city_id')->references('id')->on('cities');

        });
        
        $sql = 'alter table ' .User::TABLA. ' change profilepic profilepic mediumblob';
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(User::TABLA);
    }
}

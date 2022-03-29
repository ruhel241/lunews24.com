<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// use App\User;

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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('dept');
            $table->string('batch');
            $table->string('gender')->default('Male');
            $table->string('role');
            $table->string('avatar',500)->nullable();
            $table->string('verifyToken')->nullable();
            $table->boolean('status')->default(0);
            $table->string('email')->unique();
            $table->string('password');
           
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

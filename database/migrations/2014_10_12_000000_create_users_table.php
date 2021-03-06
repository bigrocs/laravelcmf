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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')            ->comment('用户ID');
            $table->string('name')              ->comment('用户名');
            $table->string('email')->unique()   ->comment('用户邮箱');
            $table->bigInteger('mobile')        ->comment('用户手机')->unsigned();
            $table->string('password')          ->comment('用户密码');
            $table->rememberToken()             ->comment('记住用户令牌');
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
        Schema::drop('users');
    }
}

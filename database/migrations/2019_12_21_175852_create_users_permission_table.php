<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_permission', function (Blueprint $table) {
            $table->bigIncrements('id');
        });
        Schema::table('users_permission', function(Blueprint $table)
        {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('permission_id')
                ->references('id')->on('permission');

            $table->foreign('user_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_permission');
    }
}

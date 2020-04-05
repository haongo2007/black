<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
        });
        Schema::table('attribute', function(Blueprint $table)
        {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('key_attr_id');

            $table->foreign('product_id')
                ->references('id')->on('products');
            $table->foreign('key_attr_id')
                ->references('id')->on('keys_attribute');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute');
    }
}

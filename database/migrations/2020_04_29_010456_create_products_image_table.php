<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('value');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('key_attr_id')->nullable();
            
            $table->foreign('product_id')
                ->references('id')->on('products');
            $table->foreign('key_attr_id')
                ->references('id')->on('product_attribute_keys');
        });
    }

    /**
     * Reverse the migrations.x`x`
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_image');
    }
}

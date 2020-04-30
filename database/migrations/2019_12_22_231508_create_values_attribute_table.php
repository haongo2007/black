<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuesAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value', 100);
            $table->text('code_color')->nullable();

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')->on('products');

            $table->unsignedBigInteger('product_attribute_key_id');
            $table->foreign('product_attribute_key_id')
                    ->references('id')->on('product_attribute_keys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute_values');
    }
}

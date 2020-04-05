<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('slug', 100);
            $table->decimal('price', 15, 4);
            $table->decimal('discount', 15, 4);
            $table->integer('votes')->default(0);
            $table->integer('in_stock');
            $table->integer('viewed')->default(0);
            $table->text('description');
            $table->text('tags');
            $table->timestamps();

        });
        Schema::table('products', function(Blueprint $table)
        {
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('brand_id');

            $table->foreign('creator_id')
                ->references('id')->on('users');

            $table->foreign('categories_id')
                ->references('id')->on('categories');

            $table->foreign('brand_id')
                ->references('id')->on('brands');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
    
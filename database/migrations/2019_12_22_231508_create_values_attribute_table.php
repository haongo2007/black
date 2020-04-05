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
        Schema::create('values_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value', 100);
            $table->text('image')->nullable();
            $table->text('optional')->nullable();
        });
        Schema::table('values_attribute', function(Blueprint $table)
        {
            $table->unsignedBigInteger('attribute_id');

            $table->foreign('attribute_id')
                ->references('id')->on('attribute');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('values_attribute');
    }
}

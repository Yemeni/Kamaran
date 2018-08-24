<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->index();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('specification')->nullable();
            $table->enum('unit', ['KG','Gram','Tonne','Liter','Milliliter','Barrel','Gallon','Bottle','Meter','Centimeter','Kilometer','Cartons','Pack','Packet','Box']);
            $table->enum('danger_level', ['low','normal','high']);
            $table->boolean('important')->default(false);
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
        Schema::dropIfExists('items');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('orderitem_id')->index();
            $table->tinyInteger('partial')->default(0);
            $table->timestamp('date')->nullable();
            $table->timestamp('excpected_date')->nullable();
            $table->timestamp('arrival_date')->nullable();
            $table->integer('quantity');
            $table->enum('shipment_status', ['on_hold','moving','cancelled','arrived','delayed']);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('shipments');
    }
}

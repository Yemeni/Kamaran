<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('category_id')->index();
            $table->unsignedInteger('supplier_id')->index();
            $table->unsignedInteger('item_id')->index();
            $table->enum('order_status', ['pending','approved','cancelled','other']);
            $table->timestamp('date')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('cost')->default(0);
            $table->enum('letter_of_credit', ['cif','cf','fob','cfr','other']);
            $table->timestamp('approval_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

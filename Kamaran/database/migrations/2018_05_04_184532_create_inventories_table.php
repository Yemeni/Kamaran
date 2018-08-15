<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->index();
            $table->unsignedInteger('category_id')->index();
            $table->unsignedInteger('item_id')->nullable()->index();
            $table->enum('transaction_type', ['voucher','on_hold','consume','initial_balance','returns','surplus','shortage','normal_shortage']);
            $table->timestamp('date')->nullable();
            $table->integer('quantity');
            $table->integer('arrival_status')->default(0);
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
        Schema::dropIfExists('inventories');
    }
}


<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->index()->nullable(); // exclude the employees level of users
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->default(bcrypt('kamaran'));
            $table->enum('gender', ['male', 'female']);
            $table->string('phone')->unique();
            $table->enum('level', ['admin','manager','employee','inventory_employee','head_of_suppliers']);
            $table->text('address');
            $table->enum('status', ['active','inactive'])->default('inactive');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

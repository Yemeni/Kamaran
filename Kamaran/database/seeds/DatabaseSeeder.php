<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'hisham',
            'username' => 'ahishamali',
            'email' => 'ahishamali@gmail.com',
            'password' => bcrypt('199691'),
            'phone' => '77777777',
            'status' => 1,
            'gender' => 'male',
            'category_id' => 1,
            'level' => 'admin',
            'address' => 'ring road'
        ]);
    }
}

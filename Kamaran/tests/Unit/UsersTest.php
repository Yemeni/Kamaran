<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    /**
     * Test Users Table
     */
    public function testUsersTest()
    {
        // load user manually
        $db_user = \DB::select('select * from users where id = 1');
        $db_user_username = $db_user[0]->name;

        // load user using Eloquent
        $model_user = User::find(1);
        $model_user_username = $model_user->username;

        $this->assertEquals($db_user_username, $model_user_username);
    }
    
}

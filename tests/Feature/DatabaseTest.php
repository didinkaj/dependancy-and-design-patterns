<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Blog\User;
use Illuminate\Support\Facades\Auth;

class DatabaseTest extends TestCase
{
    /*
    * login user method
    * */
    public function loginUser()
    {

        $user = factory(User::class)->create();

        return Auth::login($user, true);


    }
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testDatabase()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'jdidinya@cytonn.com'
        ]);
    }

    public function testPostBlog()
    {
        $user = $this->loginUser();
        dd($user);
        $response = $this->withHeaders([
            'X-Header' => 'Value',
            '_token' => csrf_token(),
        ])->json('POST', '/add/blog',
            [
                'user_id' => $user->id,
                'title' => 'awesome',
                'category' => 'cool',
                'body' => 'cool',
                'published' => 0,
            ]
            );

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }
}

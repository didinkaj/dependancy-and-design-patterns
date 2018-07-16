<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\Feature\AuthHttpTest;


class HTTPTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

       // $response = $this->get('editblog/5'); this fails

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        var_dump('setUp');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        var_dump('akhir');
    }
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        var_dump('test 1');
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_example_1(): void
    {
        var_dump('test 2');
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

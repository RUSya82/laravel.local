<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestNews extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get(route('admin.index'));

        $response->assertStatus(200);

        $response->assertSeeText('Привет, Admin!');
    }

    public function testExample2()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);

        $response->assertSeeText('Добро пожаловать');
    }

}

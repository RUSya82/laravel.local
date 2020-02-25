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
        $response = $this->get(route('news.newsOne', 1));

        $response->assertStatus(200);

        $response->assertSeeText('Противник россfdийского спорта');
    }

    public function testExample2()
    {
        $response = $this->get(route('news.newsOne', 0));

        $response->assertStatus(200);

        $response->assertSeeText('Противник российского спорта');
    }

}

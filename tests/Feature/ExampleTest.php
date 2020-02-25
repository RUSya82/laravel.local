<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get(route('news.newsOne', 0));

        $response->assertStatus(200);

        $response->assertSeeText('Противник российского спорта');
    }
}

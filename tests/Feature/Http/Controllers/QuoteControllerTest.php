<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class QuoteControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_quote_endpoint()
    {
        $response = $this->get('/api/v1/quote');
        $response->assertStatus(200);
    }

}

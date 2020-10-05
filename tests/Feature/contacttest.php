<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class contacttest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testContact()
    {
        $response = $this->get('contact');

        $response->assertStatus(200);
    }
}

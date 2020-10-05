<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class blogtest extends TestCase
{
    /**
     * test for an article page.
     *
     * @return void
     */
    public function BlogListtest()
    {
        $response = $this->get('article/{n}');

        $response->assertStatus(200);
    }
    
}

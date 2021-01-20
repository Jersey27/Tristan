<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Article;

class BlogTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * test for an article page.
     *
     * @return void
     */
    public function testIndexBlog()
    {
        //Préparation du test
        $article = Article::factory()->create();
        $article2 = Article::factory()->create([
            'visible' => false
        ]);
        //Execution du test
        $response = $this->get('blog');

        //Vérification de l'execution du test
        $response->assertOK();
        $response->assertSeeText($article->name, $escaped = true);
        $response->assertDontSeeText($article2->name, $escaped = true);
    }
    
}

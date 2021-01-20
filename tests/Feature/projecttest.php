<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Project;

class projectTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexProject()
    {
        //Préparation du test
        $project = Project::factory()->create();
        $project2 = Project::factory()->create(['visible' => false]);
        //Execution de la route
        $response = $this->get('/project');
        //Vérification de l'éxécution
        $response->assertStatus(200);
        $response->assertViewIs('projet');
        $response->assertSeeTextInOrder([$project->titre, $project->short_description], $escaped = true);
        $response->assertDontSeeText($project2->titre, $escaped = true);
    }

    public function testShowProject()
    {
        
        $project = Project::factory()->create();
        $databaseProject = DB::table('projects')->latest()->first();
        $response = $this->get('/project/'. $databaseProject->project_id .'');
        $response->assertStatus(200);
        $response->assertSeeTextInOrder([$project->titre,$project->short_description, $project->description], $escaped = true);
        $response->assertSee($project->image);
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\User;
use App\Project;

class AdminProjectTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexProjectAdmin()
    {
        $user = User::factory()->create();

        $project = Project::factory()->create();

        $response = $this->actingAs($user)->get('/admin/project');

        $response->assertStatus(200);

        $response->assertSeeTextInOrder([$project->name, $project->short_description]);
    }

    public function testCreateProject()
    {
        $user = User::factory()->create();

        $project = Project::factory()->make();

        Storage::fake('photos');

        $project->new_images = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->actingAs($user)->post('/admin/project', ['new_titre' => $project->titre, 'new_short_description' => $project->short_description, 'new_images' => $project->new_images, 'new_description' => $project->description]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('projects',['titre' => $project->titre, 'short_description' => $project->short_description]);

    }

    public function testModifyProject()
    {
        $user = User::factory()->create();

        $project = Project::factory()->create();
        
        Storage::fake('photos');

        $project1 = Project::factory()->make();

        $project1->images = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->actingAs($user)->patch('/admin/project', ['project_id' => 1 , 'titre' => $project1->titre, 'short_description' => $project1->short_description, 'images' => $project1->images, 'description' => $project1->description]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('projects',['titre' => $project1->titre, 'short_description' => $project1->short_description]);
    }

    public function testRemoveProject()
    {
        $user = User::factory()->create();

        $project = Project::factory()->create();

        $response = $this->actingAs($user)->delete('/admin/project/1');

        $response->assertStatus(302);

        $this->assertDatabaseMissing('projects',[$project->titre, $project->short_description]);

    }
}

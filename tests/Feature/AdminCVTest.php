<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\competence;
use App\experience;
use App\formation;
use App\langage;
use App\User;


class AdminCVTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexCvAdmin()
    {
        $competence = competence::factory()->create();
        $experience = experience::factory()->create();
        $formation = formation::factory()->create();
        $langage = langage::factory()->create();

        $user = User::factory()->create();


        $response = $this->actingAs($user)->get('/admin/cv');

        $response->assertStatus(200);

        $response->assertSee([
            $experience->titre, $experience->date, $experience->company, $experience->description,
            $competence->titre, $competence->description,
            $formation->titre, $formation->date, $formation->description,
            $langage->titre, $langage->description
        ]);
    }

    public function testAddCvAdmin()
    {
        $competence = competence::factory()->make([
            'visible' => true
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin/cv',[
            'section' => 'competence', 'titre' => $competence->titre, 'description' => $competence->description
        ]);
        $response->assertStatus(302);

        $this->assertDatabaseHas('competences',['titre' => $competence->titre, 'description' => $competence->description]);
    }

    public function testModifyCvAdmin()
    {
        $competence = competence::factory()->create(['visible' => true]);
        $competence1 = competence::factory()->make(['visible' => true]);

        $this->assertDatabaseHas('competences', ['titre' => $competence->titre, 'description' => $competence->description]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->put('/admin/cv', [
            'section' => 'competence', 'id' => 1, 'titre' => $competence1->titre, 'description' => $competence1->description
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('competences', ['titre' => $competence1->titre, 'description' => $competence1->description]);

    }

    public function testRemoveCvAdmin()
    {
        $competence = competence::factory()->create(['visible' => true]);

        $this->assertDatabaseHas('competences', ['titre' => $competence->titre, 'description' => $competence->description]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->delete('/admin/cv', [
            'section' => 'competence', 'id' => 1
        ]);
        
        $response->assertStatus(302);
        
        $this->assertDatabaseMissing('competences', ['titre' => $competence->titre, 'description' => $competence->description]);
    }
}

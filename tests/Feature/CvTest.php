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

class CvTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexBaseCv()
    {
        $competence = competence::factory()->create();
        $formation = formation::factory()->create();
        $experience = experience::factory()->create();
        $langage = langage::factory()->create();

        $response = $this->get('cv');

        $response->assertStatus(200);
        $response->assertViewIs('CV');
    }
    public function testIndexCompetenceCv()
    {
        $competence = competence::factory()->create();
        $response = $this->get('cv');

        $response->assertStatus(200);
        $response->assertSeeTextInOrder([$competence->name, $competence->description]);
    }
    public function testIndexFormationCv()
    {
        $formation = formation::factory()->create();
        $response = $this->get('cv');

        $response->assertStatus(200);
        $response->assertSeeTextInOrder([$formation->name, $formation->date, $formation->description]);
    }
    public function testIndexExperienceCv()
    {
        $experience = experience::factory()->create();
        $response = $this->get('cv');

        $response->assertStatus(200);
        $response->assertSeeTextInOrder([$experience->name,$experience->date, $experience->company, $experience->description]);
    }
    public function testIndexLangageCv()
    {
        $langage = langage::factory()->create();
        $langage1 = langage::factory()->create(['visible' => 0]);
        $response = $this->get('cv');

        $response->assertStatus(200);
        $response->assertSeeTextInOrder([$langage->name, $langage->description]);
        $response->assertDontSee($langage1->name, $escaped = true);
    }

}

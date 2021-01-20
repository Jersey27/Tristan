<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Information;

class AdminHomeTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexHomeAdmin() 
    {
        //préparation duy test
        $user = User::factory()->create();
        //execution du test
        $response = $this->actingAs($user)->get('/admin');
        //Vérification de la réponse du test
        $response->assertStatus(200);
    }
    public function testModifyHomeAdmin() 
    {
        //Préparation du test
        $user = User::factory()->create();
        $information = Information::factory()->make();
        //Execution du test
        $response = $this->actingAs($user)->put('/admin',[
            'key' => $information->key,
            'data' => $information ->data
        ]);
        //Vérification de l'éxecution du test
        $response->assertStatus(302);
        //Vérification des données Insérées
        $this->assertDatabaseHas('information', [
            'key' => $information->key,
            'data' => $information->data
        ]);
    }
}

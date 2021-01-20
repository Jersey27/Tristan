<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\information;

class HomeTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Un test pour la route de la page d'acceuil
     */
    public function testHome()
    {
        //Préparation du test
        $information = information::factory()->create();
        //Execution de la route
        $response = $this->call('GET','/');

        //Vérification de l'éxecution
        $response->assertStatus(200);
        $response->assertViewIs('welcome');
        $response->assertViewHas('presentation',$information->data);
    }
}

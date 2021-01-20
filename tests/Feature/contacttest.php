<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Contact;

class contactTest extends TestCase
{
    use DatabaseMigrations;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexContact()
    {
        //Execution de la route
        $response = $this->get('contact');
        //Vérification de l'éxécution de la méthode
        $response->assertStatus(200);
    }

    public function testStoreContact()
    {
        //Préparation du test
        $contact = Contact::factory()->make();

        //Execution de la route
        $response = $this->post('/contact',[
            'name' => $contact->name,
            'society' => $contact->society,
            'contact_email' => $contact->mail,
            'subject' => $contact->subject,
            'message' => $contact->message
            ]);

        //Vérification de la redirection
        $response->assertStatus(200);

        //Vérification des données insérées
        $this->assertDatabaseHas('contacts', [
            'name' => $contact->name,
            'society' => $contact->society,
            'mail' => $contact->mail,
            'subject' => $contact->subject,
            'message' => $contact->message
        ]);
    }
}

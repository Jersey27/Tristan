<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;
use App\Contact;

class AdminMessageTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexContactAdmin()
    {
        $user = User::factory()->create();

        $contact = Contact::factory()->create();

        $response = $this->actingAs($user)->get('/admin/contact');

        $response->assertStatus(200);

        $response->assertSee([$contact->name, $contact->subject]);
    }

    public function testShowMessageContactAdmin()
    {
        $user = User::factory()->create();

        $contact = Contact::factory()->create();

        $response = $this->actingAs($user)->get('/admin/contact/1');

        $response->assertOk();

        $response->assertSeeTextInOrder([
            $contact->name,
            $contact->society,
            $contact->mail,
            $contact->subject,
            $contact->message
        ]);
    }
}

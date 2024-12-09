<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_soft_delete_contact(): void
    {
        $this->seed();
        $contact = Contact::first();
        $user = User::first();

        $this->actingAs($user)
            ->delete(route('contacts.destroy', $contact->id))
            ->assertSessionHas(['success' => 'Contact deletado.'])
            ->assertStatus(302);
        $this->assertSoftDeleted($contact);
    }
}

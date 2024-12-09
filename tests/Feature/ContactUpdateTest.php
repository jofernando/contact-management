<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactUpdateTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    /**
     * @test
     * @dataProvider invalidContacts
     */
    public function test_user_cannot_update_contact_with_empty_fields($invalidContact, $invalidFields)
    {
        $this->seed();

        $user = User::first();

        $this->actingAs($user)
            ->post(route('contacts.store'), $invalidContact)
            ->assertSessionHasErrors($invalidFields)
            ->assertStatus(302);
    }

    public function test_user_cannot_update_contact_with_email_already_registered()
    {
        $this->seed();

        $user = User::first();

        $validName = fake()->name();
        $validContact = fake()->randomNumber(9, true);
        $invalidEmail = Contact::select('email')->first()->email;

        $this->actingAs($user)
            ->post(route('contacts.store'), ['name' => $validName, 'contact' => $validContact, 'email' => $invalidEmail])
            ->assertSessionHasErrors(['email' => __('validation.unique', ['attribute' => 'email'])])
            ->assertStatus(302);
    }

    public function test_user_cannot_update_contact_with_contact_already_registered()
    {
        $this->seed();

        $user = User::first();

        $validName = fake()->name();
        $invalidContact = Contact::select('contact')->first()->contact;
        $validEmail =fake()->unique()->safeEmail();

        $this->actingAs($user)
            ->post(route('contacts.store'), ['name' => $validName, 'contact' => $invalidContact, 'email' => $validEmail])
            ->assertSessionHasErrors(['contact' => __('validation.unique', ['attribute' => 'contact'])])
            ->assertStatus(302);
    }

    public function test_user_can_update_contact()
    {
        $this->seed();

        $user = User::first();

        $contact_count = Contact::count();

        $contact = Contact::first();

        $this->actingAs($user)
            ->put(route('contacts.update', $contact->id), $contact->toArray())
            ->assertSessionHas('success', 'Contact salvo.')
            ->assertStatus(302);
        $this->assertDatabaseCount('contacts', $contact_count);
    }

    public static function invalidContacts()
    {
        $validName = 'Cleora Turcotte Sr.';
        $validContact = '779558587';
        $validEmail = 'imarks@example.com';
        return [
            [
                ['name' => $validName, 'contact', 'email'],
                ['contact', 'email']
            ],
            [
                ['name', 'contact' => $validContact, 'email'],
                ['name', 'email']
            ],
            [
                ['name', 'contact' => $validContact, 'email' => $validEmail],
                ['name']
            ]
        ];
    }
}

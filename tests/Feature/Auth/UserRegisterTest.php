<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_user_register(): void
    {
        $response = $this->post(route('users.register'), [
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'phone' => '+7 (995) 611-22-67',
            'type' => 'webmaster',
            'telegram' => 'webmaster',
            'about_self' => 'Веб-разработчик',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201);
    }

    public function test_unprocessable_content(): void
    {
        $response = $this->post(route('users.register'), [
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'type' => 'webmaster',
            'telegram' => 'webmaster',
            'about_self' => 'Веб-разработчик',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
    }

    public function test_user_type_doesnt_in_array(): void
    {
        $response = $this->post(route('users.register'), [
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'phone' => '+7 (995) 611-22-67',
            'type' => 'no_in_type',
            'telegram' => 'webmaster',
            'about_self' => 'Веб-разработчик',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
    }
}

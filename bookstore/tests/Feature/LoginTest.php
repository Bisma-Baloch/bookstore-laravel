<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->login();
        $user = User::factory()->create();
        $this->get(route('login'))
        ->assertOk()
        ->assertSeeText('Email address')
        ->assertSeeText('Password')
        ->assertSee($user->passwod);
    }
}

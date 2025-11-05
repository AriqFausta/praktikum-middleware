<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_regular_user_cannot_access_admin(): void
    {
        $user = User::factory()->create(['role' => 'user']);

        $this->actingAs($user)
             ->get('/admin')
             ->assertRedirect('/');
    }

    public function test_admin_user_can_access_admin(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)
             ->get('/admin')
             ->assertStatus(200)
             ->assertSee('Welcome to the admin panel.');
    }
}

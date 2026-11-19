<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\RolSeeder;
use Database\Seeders\UsuarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([RolSeeder::class, UsuarioSeeder::class]);
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $this->get(route('login'))->assertOk();
    }

    public function test_users_can_authenticate(): void
    {
        $response = $this->post(route('login.store'), [
            'email' => 'admin@pcsaurios.test',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_invalid_credentials_are_rejected(): void
    {
        $response = $this->post(route('login.store'), [
            'email' => 'admin@pcsaurios.test',
            'password' => 'incorrecta',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::where('email', 'admin@pcsaurios.test')->firstOrFail();

        $this->actingAs($user)
            ->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }

    public function test_guest_is_redirected_to_login(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
    }
}

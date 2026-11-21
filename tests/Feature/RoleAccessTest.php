<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\EmpresaSeeder;
use Database\Seeders\RolSeeder;
use Database\Seeders\UsuarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([RolSeeder::class, EmpresaSeeder::class, UsuarioSeeder::class]);
    }

    private function userWithEmail(string $email): User
    {
        return User::where('email', $email)->firstOrFail();
    }

    public function test_editor_can_access_catalog_and_orders(): void
    {
        $editor = $this->userWithEmail('editor@pcsaurios.test');

        $this->actingAs($editor)
            ->get(route('admin.dashboard'))
            ->assertOk();

        $this->actingAs($editor)
            ->get(route('admin.productos.index'))
            ->assertOk();

        $this->actingAs($editor)
            ->get(route('admin.pedidos.index'))
            ->assertOk();
    }

    public function test_editor_cannot_manage_company_data(): void
    {
        $editor = $this->userWithEmail('editor@pcsaurios.test');

        $this->actingAs($editor)
            ->get(route('admin.empresa.edit'))
            ->assertForbidden();

        $this->actingAs($editor)
            ->put(route('admin.empresa.update'), ['nombre' => 'Otro nombre'])
            ->assertForbidden();
    }

    public function test_client_cannot_access_admin_panel(): void
    {
        $cliente = $this->userWithEmail('cliente@pcsaurios.test');

        $this->actingAs($cliente)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_admin_can_manage_company_data(): void
    {
        $admin = $this->userWithEmail('admin@pcsaurios.test');

        $this->actingAs($admin)
            ->get(route('admin.empresa.edit'))
            ->assertOk();
    }
}

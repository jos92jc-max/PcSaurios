<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;
use Database\Seeders\CatalogoSeeder;
use Database\Seeders\EmpresaSeeder;
use Database\Seeders\RolSeeder;
use Database\Seeders\UsuarioSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogoCrudTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([RolSeeder::class, EmpresaSeeder::class, CatalogoSeeder::class, UsuarioSeeder::class]);
        $this->actingAs(User::where('email', 'admin@pcsaurios.test')->firstOrFail());
    }

    public function test_can_create_category(): void
    {
        $this->post(route('admin.categorias.store'), [
            'nombre' => 'Sleeves',
            'slug' => 'sleeves',
            'descripcion' => 'Protectores',
        ])->assertRedirect(route('admin.categorias.index'));

        $this->assertDatabaseHas('categorias', ['slug' => 'sleeves']);
    }

    public function test_can_create_and_update_product(): void
    {
        $categoria = Categoria::where('slug', 'photocard')->firstOrFail();

        $this->post(route('admin.productos.store'), [
            'categoria_id' => $categoria->id,
            'nombre' => 'Producto de prueba',
            'integrante' => 'Jin',
            'precio' => 100,
            'precio_etiqueta' => null,
            'disponible' => 1,
        ])->assertRedirect(route('admin.productos.index'));

        $producto = Producto::where('nombre', 'Producto de prueba')->firstOrFail();

        $this->put(route('admin.productos.update', $producto), [
            'categoria_id' => $categoria->id,
            'nombre' => 'Producto actualizado',
            'integrante' => 'Jin',
            'precio' => 120,
            'precio_etiqueta' => null,
            'disponible' => 1,
        ])->assertRedirect(route('admin.productos.index'));

        $this->assertDatabaseHas('productos', ['nombre' => 'Producto actualizado', 'precio' => 120]);
    }

    public function test_can_create_and_delete_order(): void
    {
        $producto = Producto::firstOrFail();

        $this->post(route('admin.pedidos.store'), [
            'codigo' => 'PCS-TEST-001',
            'producto_id' => $producto->id,
            'cliente_nombre' => 'Prueba interna',
            'cliente_email' => 'prueba@pcsaurios.test',
            'cantidad' => 1,
            'estado' => Pedido::ESTADOS[0],
            'total' => 150,
            'notas' => null,
        ])->assertRedirect(route('admin.pedidos.index'));

        $pedido = Pedido::where('codigo', 'PCS-TEST-001')->firstOrFail();

        $this->delete(route('admin.pedidos.destroy', $pedido))
            ->assertRedirect(route('admin.pedidos.index'));

        $this->assertDatabaseMissing('pedidos', ['codigo' => 'PCS-TEST-001']);
    }
}

<?php

namespace Tests\Feature\Api;

use Database\Seeders\CatalogoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogoApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(CatalogoSeeder::class);
    }

    public function test_catalogo_endpoint_returns_public_data(): void
    {
        $response = $this->getJson('/api/catalogo');

        $response->assertOk()
            ->assertJsonCount(5, 'categorias')
            ->assertJsonCount(14, 'productos')
            ->assertJsonCount(5, 'estados_ems')
            ->assertJsonFragment(['nombre' => 'RAKIDORO JK', 'precio_mostrado' => '$150 MXN', 'imagen' => 'img/productos/RAKIDORO JK.webp'])
            ->assertJsonFragment(['nombre' => 'Gigi Polaroid 1', 'imagen' => 'img/productos/GIGI POLAROID1.jpeg'])
            ->assertJsonFragment(['slug' => 'photocard']);

        $productosConImagen = collect($response->json('productos'))
            ->filter(fn (array $producto) => filled($producto['imagen']));

        $this->assertCount(4, $productosConImagen);
        $this->assertContains('YA EN TERRITORIO MX', $response->json('estados_ems'));
        $this->assertArrayNotHasKey('pedidos', $response->json());
        $this->assertArrayNotHasKey('cliente_email', $response->json());
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class PortadaTest extends TestCase
{
    public function test_portada_route_returns_static_page(): void
    {
        $this->get(route('portada'))
            ->assertOk()
            ->assertSee('PcSaurios');
    }

    public function test_portada_muestra_acceso_administrativo(): void
    {
        $this->get(route('portada'))
            ->assertOk()
            ->assertSee('Acceso administrativo')
            ->assertSee('href="/login"', false);
    }

    public function test_portada_muestra_fotos_confirmadas(): void
    {
        $response = $this->get(route('portada'));

        $response->assertOk()
            ->assertSee('img/productos/RAKIDORO JK.webp')
            ->assertSee('img/productos/VINYL POLAROID ARIRANG VINYL 01.jpeg')
            ->assertSee('img/productos/GIGI POLAROID1.jpeg')
            ->assertSee('img/productos/GIGI CAMISA NEGRA 5.jpeg');

        $this->assertSame(10, substr_count($response->getContent(), 'Fotografía en confirmación'));
    }
}

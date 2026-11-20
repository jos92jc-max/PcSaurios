<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomeTest extends TestCase
{
    public function test_welcome_muestra_acceso_administrativo(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Acceso administrativo')
            ->assertSee(route('login'), false)
            ->assertSee(route('portada'), false);
    }
}

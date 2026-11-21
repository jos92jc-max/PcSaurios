<?php

namespace Database\Seeders;

use App\Models\Rol;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Administrador' => 'Gestiona todos los módulos y la configuración general.',
            'Editor' => 'Gestiona catálogo y pedidos.',
            'Cliente' => 'Acceso público, sin panel administrativo.',
        ];

        foreach ($roles as $nombre => $descripcion) {
            Rol::firstOrCreate(
                ['nombre' => $nombre],
                ['descripcion' => $descripcion]
            );
        }
    }
}

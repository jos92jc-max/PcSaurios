<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    public function run(): void
    {
        Empresa::firstOrCreate(
            ['nombre' => 'PcSaurios'],
            [
                'descripcion' => 'Catálogo de photocards, polaroids, figuras y artículos coleccionables para coleccionistas.',
                'logo' => 'img/identidad/logo-pcsaurios.webp',
            ]
        );
    }
}

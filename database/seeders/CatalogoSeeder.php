<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class CatalogoSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            'photocard' => 'Photocards',
            'polaroid' => 'Polaroids',
            'figura' => 'Figuras',
            'album' => 'Álbumes',
            'otros' => 'Otros',
        ];

        foreach ($categorias as $slug => $nombre) {
            Categoria::firstOrCreate(
                ['slug' => $slug],
                ['nombre' => $nombre]
            );
        }

        $productos = [
            ['photocard', 'RAKIDORO JK', 'JK', 150.00, '$150 MXN'],
            ['figura', 'BT21 KOYA', 'Namjoon', 99.00, '$99 MXN'],
            ['figura', 'BT21 RJ', 'Jin', 99.00, '$99 MXN'],
            ['figura', 'BT21 CHIMMY', 'Jimin', 99.00, '$99 MXN'],
            ['photocard', 'ARIRANG POLAROID VINYLO1', 'Namjoon / Jin', 100.00, '$100 MXN c/u'],
            ['polaroid', 'Gigi Polaroid 1', 'Yoongi', 120.00, '$120 MXN'],
            ['photocard', 'Gigi camisa negra 5', 'Yoongi', 175.00, '$175 MXN'],
            ['polaroid', 'Vinyl Polaroid 02', 'Namjoon / Jimin', 185.00, '$185 MXN c/u'],
            ['photocard', 'Fake Love', 'Namjoon / Jin / Jimin', 35.00, '$35 MXN c/u'],
            ['photocard', 'BTS SEAGRI 2022', 'Namjoon', 50.00, '$50 MXN'],
            ['otros', 'HAPPY HOLDER verde — Jin', 'Jin', null, 'Precio por confirmar'],
            ['otros', 'happy azul — Jin', 'Jin', null, 'Precio por confirmar'],
            ['otros', 'happy rojo — Jin', 'Jin', null, 'Precio por confirmar'],
            ['otros', 'This&That SKZ', 'SKZ', null, 'Precio por confirmar'],
        ];

        foreach ($productos as [$slug, $nombre, $integrante, $precio, $etiqueta]) {
            Producto::firstOrCreate(
                ['nombre' => $nombre],
                [
                    'categoria_id' => Categoria::where('slug', $slug)->firstOrFail()->id,
                    'integrante' => $integrante,
                    'precio' => $precio,
                    'precio_etiqueta' => $etiqueta,
                    'disponible' => true,
                ]
            );
        }
    }
}

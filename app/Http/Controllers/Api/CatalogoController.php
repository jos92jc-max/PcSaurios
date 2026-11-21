<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\JsonResponse;

class CatalogoController extends Controller
{
    public function index(): JsonResponse
    {
        $categorias = Categoria::orderBy('nombre')
            ->get(['id', 'nombre', 'slug'])
            ->map(fn (Categoria $categoria) => [
                'id' => $categoria->id,
                'nombre' => $categoria->nombre,
                'slug' => $categoria->slug,
            ]);

        $productos = Producto::with('categoria:id,nombre,slug')
            ->where('disponible', true)
            ->orderBy('nombre')
            ->get()
            ->map(fn (Producto $producto) => [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'integrante' => $producto->integrante,
                'precio' => $producto->precio,
                'precio_mostrado' => $producto->precio_mostrado,
                'disponible' => $producto->disponible,
                'imagen' => $producto->imagen,
                'categoria' => [
                    'id' => $producto->categoria->id,
                    'nombre' => $producto->categoria->nombre,
                    'slug' => $producto->categoria->slug,
                ],
            ]);

        return response()->json([
            'categorias' => $categorias,
            'productos' => $productos,
            'estados_ems' => Pedido::ESTADOS,
        ]);
    }
}

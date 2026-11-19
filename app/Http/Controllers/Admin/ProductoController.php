<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('admin.productos.index', [
            'productos' => Producto::with('categoria')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.productos.create', [
            'categorias' => Categoria::orderBy('nombre')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'categoria_id' => ['required', 'exists:categorias,id'],
            'nombre' => ['required', 'string', 'max:120'],
            'integrante' => ['nullable', 'string', 'max:120'],
            'precio' => ['nullable', 'numeric', 'min:0'],
            'precio_etiqueta' => ['nullable', 'string', 'max:80'],
            'disponible' => ['boolean'],
            'imagen' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['disponible'] = $request->boolean('disponible');

        Producto::create($validated);

        return redirect()->route('admin.productos.index')->with('status', 'Producto creado.');
    }

    public function edit(Producto $producto)
    {
        return view('admin.productos.edit', [
            'producto' => $producto,
            'categorias' => Categoria::orderBy('nombre')->get(),
        ]);
    }

    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'categoria_id' => ['required', 'exists:categorias,id'],
            'nombre' => ['required', 'string', 'max:120'],
            'integrante' => ['nullable', 'string', 'max:120'],
            'precio' => ['nullable', 'numeric', 'min:0'],
            'precio_etiqueta' => ['nullable', 'string', 'max:80'],
            'disponible' => ['boolean'],
            'imagen' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['disponible'] = $request->boolean('disponible');

        $producto->update($validated);

        return redirect()->route('admin.productos.index')->with('status', 'Producto actualizado.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->pedidos()->exists()) {
            return back()->with('error', 'No se puede eliminar un producto con pedidos asociados.');
        }

        $producto->delete();

        return redirect()->route('admin.productos.index')->with('status', 'Producto eliminado.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('admin.categorias.index', [
            'categorias' => Categoria::withCount('productos')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:80', 'unique:categorias,nombre'],
            'slug' => ['required', 'string', 'max:80', 'unique:categorias,slug'],
            'descripcion' => ['nullable', 'string'],
        ]);

        Categoria::create($validated);

        return redirect()->route('admin.categorias.index')->with('status', 'Categoría creada.');
    }

    public function edit(Categoria $categoria)
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:80', Rule::unique('categorias', 'nombre')->ignore($categoria->id)],
            'slug' => ['required', 'string', 'max:80', Rule::unique('categorias', 'slug')->ignore($categoria->id)],
            'descripcion' => ['nullable', 'string'],
        ]);

        $categoria->update($validated);

        return redirect()->route('admin.categorias.index')->with('status', 'Categoría actualizada.');
    }

    public function destroy(Categoria $categoria)
    {
        if ($categoria->productos()->exists()) {
            return back()->with('error', 'No se puede eliminar una categoría con productos asociados.');
        }

        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('status', 'Categoría eliminada.');
    }
}

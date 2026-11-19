<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PedidoController extends Controller
{
    public function index()
    {
        return view('admin.pedidos.index', [
            'pedidos' => Pedido::with(['producto', 'user'])->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('admin.pedidos.create', [
            'productos' => Producto::orderBy('nombre')->get(),
            'estados' => Pedido::ESTADOS,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => ['required', 'string', 'max:40', 'unique:pedidos,codigo'],
            'producto_id' => ['required', 'exists:productos,id'],
            'cliente_nombre' => ['required', 'string', 'max:120'],
            'cliente_email' => ['nullable', 'email', 'max:150'],
            'cantidad' => ['required', 'integer', 'min:1'],
            'estado' => ['required', Rule::in(Pedido::ESTADOS)],
            'total' => ['nullable', 'numeric', 'min:0'],
            'notas' => ['nullable', 'string'],
        ]);

        $validated['user_id'] = Auth::id();

        Pedido::create($validated);

        return redirect()->route('admin.pedidos.index')->with('status', 'Pedido creado.');
    }

    public function edit(Pedido $pedido)
    {
        return view('admin.pedidos.edit', [
            'pedido' => $pedido,
            'productos' => Producto::orderBy('nombre')->get(),
            'estados' => Pedido::ESTADOS,
        ]);
    }

    public function update(Request $request, Pedido $pedido)
    {
        $validated = $request->validate([
            'codigo' => ['required', 'string', 'max:40', Rule::unique('pedidos', 'codigo')->ignore($pedido->id)],
            'producto_id' => ['required', 'exists:productos,id'],
            'cliente_nombre' => ['required', 'string', 'max:120'],
            'cliente_email' => ['nullable', 'email', 'max:150'],
            'cantidad' => ['required', 'integer', 'min:1'],
            'estado' => ['required', Rule::in(Pedido::ESTADOS)],
            'total' => ['nullable', 'numeric', 'min:0'],
            'notas' => ['nullable', 'string'],
        ]);

        $pedido->update($validated);

        return redirect()->route('admin.pedidos.index')->with('status', 'Pedido actualizado.');
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();

        return redirect()->route('admin.pedidos.index')->with('status', 'Pedido eliminado.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'totalProductos' => Producto::count(),
            'totalCategorias' => Categoria::count(),
            'totalPedidos' => Pedido::count(),
            'totalUsuarios' => User::count(),
            'pedidosRecientes' => Pedido::with('producto')->latest()->take(5)->get(),
        ]);
    }
}

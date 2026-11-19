@extends('layouts.app')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Resumen general</h2>
      <p>Estado actual del catálogo y los pedidos registrados.</p>
    </div>
    @can('gestionar-catalogo')
      <a class="btn btn-primary" href="{{ route('admin.productos.create') }}">Nuevo producto</a>
    @endcan
  </div>

  <div class="stats-grid">
    <div class="stat-card">
      <span class="stat-label">Productos</span>
      <span class="stat-value">{{ $totalProductos }}</span>
    </div>
    <div class="stat-card">
      <span class="stat-label">Categorías</span>
      <span class="stat-value">{{ $totalCategorias }}</span>
    </div>
    <div class="stat-card">
      <span class="stat-label">Pedidos</span>
      <span class="stat-value">{{ $totalPedidos }}</span>
    </div>
    <div class="stat-card">
      <span class="stat-label">Usuarios</span>
      <span class="stat-value">{{ $totalUsuarios }}</span>
    </div>
  </div>

  <div class="card">
    <div class="card-header">Pedidos recientes</div>
    <div class="card-body table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th>Código</th>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Estado</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pedidosRecientes as $pedido)
            <tr>
              <td>{{ $pedido->codigo }}</td>
              <td>{{ $pedido->cliente_nombre }}</td>
              <td>{{ $pedido->producto->nombre }}</td>
              <td><span class="badge badge-info">{{ $pedido->estado }}</span></td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="empty">Aún no hay pedidos registrados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection

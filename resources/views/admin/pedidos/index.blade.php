@extends('layouts.app')

@section('title', 'Pedidos')
@section('heading', 'Pedidos')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Pedidos</h2>
      <p>Seguimiento de solicitudes y estados EMS.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('admin.pedidos.create') }}">Nuevo pedido</a>
  </div>

  <div class="card">
    <div class="card-body table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th>Código</th>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pedidos as $pedido)
            <tr>
              <td>{{ $pedido->codigo }}</td>
              <td>{{ $pedido->cliente_nombre }}</td>
              <td>{{ $pedido->producto->nombre }}</td>
              <td>{{ $pedido->cantidad }}</td>
              <td><span class="badge badge-info">{{ $pedido->estado }}</span></td>
              <td>
                <div class="table-actions">
                  <a class="btn btn-secondary btn-sm" href="{{ route('admin.pedidos.edit', $pedido) }}">Editar</a>
                  <form method="POST" action="{{ route('admin.pedidos.destroy', $pedido) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="empty">No hay pedidos registrados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection

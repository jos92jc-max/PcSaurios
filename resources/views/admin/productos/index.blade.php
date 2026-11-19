@extends('layouts.app')

@section('title', 'Productos')
@section('heading', 'Productos')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Productos</h2>
      <p>Catálogo disponible en la tienda.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('admin.productos.create') }}">Nuevo producto</a>
  </div>

  <div class="card">
    <div class="card-body table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Integrante</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($productos as $producto)
            <tr>
              <td>{{ $producto->nombre }}</td>
              <td>{{ $producto->categoria->nombre }}</td>
              <td>{{ $producto->integrante ?? '—' }}</td>
              <td>{{ $producto->precio_mostrado }}</td>
              <td>
                <span class="badge {{ $producto->disponible ? 'badge-success' : 'badge-warning' }}">
                  {{ $producto->disponible ? 'Disponible' : 'No disponible' }}
                </span>
              </td>
              <td>
                <div class="table-actions">
                  <a class="btn btn-secondary btn-sm" href="{{ route('admin.productos.edit', $producto) }}">Editar</a>
                  <form method="POST" action="{{ route('admin.productos.destroy', $producto) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="empty">No hay productos registrados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('title', 'Categorías')
@section('heading', 'Categorías')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Categorías</h2>
      <p>Clasificación del catálogo de PcSaurios.</p>
    </div>
    <a class="btn btn-primary" href="{{ route('admin.categorias.create') }}">Nueva categoría</a>
  </div>

  <div class="card">
    <div class="card-body table-wrap">
      <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Slug</th>
            <th>Productos</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($categorias as $categoria)
            <tr>
              <td>{{ $categoria->nombre }}</td>
              <td><span class="badge">{{ $categoria->slug }}</span></td>
              <td>{{ $categoria->productos_count }}</td>
              <td>
                <div class="table-actions">
                  <a class="btn btn-secondary btn-sm" href="{{ route('admin.categorias.edit', $categoria) }}">Editar</a>
                  <form method="POST" action="{{ route('admin.categorias.destroy', $categoria) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="empty">No hay categorías registradas.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection

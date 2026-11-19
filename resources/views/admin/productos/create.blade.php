@extends('layouts.app')

@section('title', 'Nuevo producto')
@section('heading', 'Productos')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Nuevo producto</h2>
      <p>Agrega un artículo al catálogo.</p>
    </div>
    <a class="btn btn-secondary" href="{{ route('admin.productos.index') }}">Volver</a>
  </div>

  <div class="card">
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-error">
          @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
          @endforeach
        </div>
      @endif

      <form method="POST" action="{{ route('admin.productos.store') }}">
        @csrf
        <div class="form-grid">
          <div class="form-group">
            <label class="form-label" for="nombre">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="categoria_id">Categoría</label>
            <select class="form-select" id="categoria_id" name="categoria_id" required>
              @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="integrante">Integrante o variante</label>
            <input class="form-control" id="integrante" name="integrante" value="{{ old('integrante') }}">
          </div>
          <div class="form-group">
            <label class="form-label" for="precio">Precio</label>
            <input class="form-control" id="precio" name="precio" type="number" min="0" step="0.01" value="{{ old('precio') }}">
          </div>
          <div class="form-group">
            <label class="form-label" for="precio_etiqueta">Etiqueta de precio</label>
            <input class="form-control" id="precio_etiqueta" name="precio_etiqueta" value="{{ old('precio_etiqueta') }}" placeholder="Precio por confirmar">
          </div>
          <div class="form-group">
            <label class="form-label" for="imagen">Ruta de imagen</label>
            <input class="form-control" id="imagen" name="imagen" value="{{ old('imagen') }}">
          </div>
          <div class="form-group full">
            <label class="form-check">
              <input type="checkbox" name="disponible" value="1" {{ old('disponible', true) ? 'checked' : '' }}>
              Disponible
            </label>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <a class="btn btn-secondary" href="{{ route('admin.productos.index') }}">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
@endsection

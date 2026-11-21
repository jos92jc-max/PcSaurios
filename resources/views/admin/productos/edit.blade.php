@extends('layouts.app')

@section('title', 'Editar producto')
@section('heading', 'Productos')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Editar producto</h2>
      <p>{{ $producto->nombre }}</p>
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

      <form method="POST" action="{{ route('admin.productos.update', $producto) }}">
        @csrf
        @method('PUT')
        <div class="form-grid">
          <div class="form-group">
            <label class="form-label" for="nombre">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="categoria_id">Categoría</label>
            <select class="form-select" id="categoria_id" name="categoria_id" required>
              @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="integrante">Integrante o variante</label>
            <input class="form-control" id="integrante" name="integrante" value="{{ old('integrante', $producto->integrante) }}">
          </div>
          <div class="form-group">
            <label class="form-label" for="precio">Precio</label>
            <input class="form-control" id="precio" name="precio" type="number" min="0" step="0.01" value="{{ old('precio', $producto->precio) }}">
          </div>
          <div class="form-group">
            <label class="form-label" for="precio_etiqueta">Etiqueta de precio</label>
            <input class="form-control" id="precio_etiqueta" name="precio_etiqueta" value="{{ old('precio_etiqueta', $producto->precio_etiqueta) }}">
          </div>
          <div class="form-group">
            <label class="form-label" for="imagen">Ruta de imagen</label>
            <input class="form-control" id="imagen" name="imagen" value="{{ old('imagen', $producto->imagen) }}">
          </div>
          <div class="form-group full">
            <label class="form-check">
              <input type="checkbox" name="disponible" value="1" {{ old('disponible', $producto->disponible) ? 'checked' : '' }}>
              Disponible
            </label>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary" type="submit">Actualizar</button>
          <a class="btn btn-secondary" href="{{ route('admin.productos.index') }}">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
@endsection

@extends('layouts.app')

@section('title', 'Editar categoría')
@section('heading', 'Categorías')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Editar categoría</h2>
      <p>{{ $categoria->nombre }}</p>
    </div>
    <a class="btn btn-secondary" href="{{ route('admin.categorias.index') }}">Volver</a>
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

      <form method="POST" action="{{ route('admin.categorias.update', $categoria) }}">
        @csrf
        @method('PUT')
        <div class="form-grid">
          <div class="form-group">
            <label class="form-label" for="nombre">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="slug">Slug</label>
            <input class="form-control" id="slug" name="slug" value="{{ old('slug', $categoria->slug) }}" required>
          </div>
          <div class="form-group full">
            <label class="form-label" for="descripcion">Descripción</label>
            <textarea class="form-textarea" id="descripcion" name="descripcion">{{ old('descripcion', $categoria->descripcion) }}</textarea>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary" type="submit">Actualizar</button>
          <a class="btn btn-secondary" href="{{ route('admin.categorias.index') }}">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
@endsection

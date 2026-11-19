@extends('layouts.app')

@section('title', 'Nueva categoría')
@section('heading', 'Categorías')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Nueva categoría</h2>
      <p>Registra una clasificación para el catálogo.</p>
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

      <form method="POST" action="{{ route('admin.categorias.store') }}">
        @csrf
        <div class="form-grid">
          <div class="form-group">
            <label class="form-label" for="nombre">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="slug">Slug</label>
            <input class="form-control" id="slug" name="slug" value="{{ old('slug') }}" placeholder="photocard" required>
          </div>
          <div class="form-group full">
            <label class="form-label" for="descripcion">Descripción</label>
            <textarea class="form-textarea" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <a class="btn btn-secondary" href="{{ route('admin.categorias.index') }}">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
@endsection

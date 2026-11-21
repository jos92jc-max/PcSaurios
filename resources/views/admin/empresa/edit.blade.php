@extends('layouts.app')

@section('title', 'Datos generales')
@section('heading', 'Datos generales')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Datos generales del negocio</h2>
      <p>Información pública de PcSaurios. Solo puede editarla un Administrador.</p>
    </div>
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

      <form method="POST" action="{{ route('admin.empresa.update') }}">
        @csrf
        @method('PUT')
        <div class="form-grid">
          <div class="form-group">
            <label class="form-label" for="nombre">Nombre</label>
            <input class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $empresa->nombre) }}" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="correo">Correo</label>
            <input class="form-control" id="correo" name="correo" type="email" value="{{ old('correo', $empresa->correo) }}">
          </div>
          <div class="form-group">
            <label class="form-label" for="telefono">Teléfono</label>
            <input class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $empresa->telefono) }}">
          </div>
          <div class="form-group">
            <label class="form-label" for="direccion">Dirección</label>
            <input class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $empresa->direccion) }}">
          </div>
          <div class="form-group full">
            <label class="form-label" for="logo">Ruta del logotipo</label>
            <input class="form-control" id="logo" name="logo" value="{{ old('logo', $empresa->logo) }}">
          </div>
          <div class="form-group full">
            <label class="form-label" for="descripcion">Descripción</label>
            <textarea class="form-textarea" id="descripcion" name="descripcion">{{ old('descripcion', $empresa->descripcion) }}</textarea>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary" type="submit">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
@endsection

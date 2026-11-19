@extends('layouts.app')

@section('title', 'Nuevo pedido')
@section('heading', 'Pedidos')

@section('content')
  <div class="page-heading">
    <div>
      <h2>Nuevo pedido</h2>
      <p>Registra una solicitud y su estado de envío.</p>
    </div>
    <a class="btn btn-secondary" href="{{ route('admin.pedidos.index') }}">Volver</a>
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

      <form method="POST" action="{{ route('admin.pedidos.store') }}">
        @csrf
        <div class="form-grid">
          <div class="form-group">
            <label class="form-label" for="codigo">Código</label>
            <input class="form-control" id="codigo" name="codigo" value="{{ old('codigo') }}" placeholder="PCS-0001" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="producto_id">Producto</label>
            <select class="form-select" id="producto_id" name="producto_id" required>
              @foreach ($productos as $producto)
                <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>{{ $producto->nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="cliente_nombre">Nombre del cliente</label>
            <input class="form-control" id="cliente_nombre" name="cliente_nombre" value="{{ old('cliente_nombre') }}" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="cliente_email">Correo del cliente</label>
            <input class="form-control" id="cliente_email" name="cliente_email" type="email" value="{{ old('cliente_email') }}">
          </div>
          <div class="form-group">
            <label class="form-label" for="cantidad">Cantidad</label>
            <input class="form-control" id="cantidad" name="cantidad" type="number" min="1" value="{{ old('cantidad', 1) }}" required>
          </div>
          <div class="form-group">
            <label class="form-label" for="estado">Estado</label>
            <select class="form-select" id="estado" name="estado" required>
              @foreach ($estados as $estado)
                <option value="{{ $estado }}" {{ old('estado') === $estado ? 'selected' : '' }}>{{ $estado }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="total">Total</label>
            <input class="form-control" id="total" name="total" type="number" min="0" step="0.01" value="{{ old('total') }}">
          </div>
          <div class="form-group full">
            <label class="form-label" for="notas">Notas</label>
            <textarea class="form-textarea" id="notas" name="notas">{{ old('notas') }}</textarea>
          </div>
        </div>
        <div class="form-actions">
          <button class="btn btn-primary" type="submit">Guardar</button>
          <a class="btn btn-secondary" href="{{ route('admin.pedidos.index') }}">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
@endsection

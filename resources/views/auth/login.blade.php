@extends('layouts.guest')

@section('title', 'Iniciar sesión — PcSaurios')

@section('content')
  <div class="login-page">
    <div class="login-card">
      <div class="login-brand">PcSaurios</div>
      <h1>Iniciar sesión</h1>
      <p>Acceso al panel administrativo.</p>

      @if ($errors->any())
        <div class="alert alert-error">
          @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
          @endforeach
        </div>
      @endif

      <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <div class="form-group">
          <label class="form-label" for="email">Correo electrónico</label>
          <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="username" required autofocus>
        </div>
        <div class="form-group" style="margin-top: 16px;">
          <label class="form-label" for="password">Contraseña</label>
          <input class="form-control" id="password" name="password" type="password" autocomplete="current-password" required>
        </div>
        <label class="form-check" style="margin-top: 14px;">
          <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
          Recordarme
        </label>
        <button class="btn btn-primary" type="submit">Ingresar</button>
      </form>
      <div class="login-hint">Usa las credenciales asignadas por el administrador del sistema.</div>
    </div>
  </div>
@endsection

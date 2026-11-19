<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Panel') — PcSaurios</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
  <div class="admin-shell">
    <aside class="admin-sidebar">
      <div class="admin-brand">
        <span class="admin-brand-mark">P</span>
        <span>PcSaurios</span>
      </div>
      <div class="admin-nav-title">Administración</div>
      <nav class="admin-nav">
        <a class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
        @can('gestionar-catalogo')
          <a class="admin-nav-link {{ request()->routeIs('admin.categorias.*') ? 'active' : '' }}" href="{{ route('admin.categorias.index') }}">Categorías</a>
          <a class="admin-nav-link {{ request()->routeIs('admin.productos.*') ? 'active' : '' }}" href="{{ route('admin.productos.index') }}">Productos</a>
        @endcan
        @can('gestionar-pedidos')
          <a class="admin-nav-link {{ request()->routeIs('admin.pedidos.*') ? 'active' : '' }}" href="{{ route('admin.pedidos.index') }}">Pedidos</a>
        @endcan
        @can('administrar-empresa')
          <a class="admin-nav-link {{ request()->routeIs('admin.empresa.*') ? 'active' : '' }}" href="{{ route('admin.empresa.edit') }}">Datos generales</a>
        @endcan
      </nav>
    </aside>
    <div class="admin-main">
      <header class="admin-topbar">
        <h1>@yield('heading', 'Panel')</h1>
        <div class="admin-user">
          <span>Hola, <strong>{{ Auth::user()->name }}</strong></span>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-secondary btn-sm" type="submit">Cerrar sesión</button>
          </form>
        </div>
      </header>
      <main class="admin-content">
        @if (session('status'))
          <div class="alert alert-status">{{ session('status') }}</div>
        @endif
        @if (session('error'))
          <div class="alert alert-error">{{ session('error') }}</div>
        @endif
        @yield('content')
      </main>
    </div>
  </div>
</body>
</html>

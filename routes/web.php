<?php

use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmpresaController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth')->name('home');

Route::middleware(['auth', 'role:Administrador,Editor'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categorias', CategoriaController::class)->except(['show']);
    Route::resource('productos', ProductoController::class)->except(['show']);
    Route::resource('pedidos', PedidoController::class)->except(['show']);

    Route::middleware('role:Administrador')->group(function () {
        Route::get('empresa', [EmpresaController::class, 'edit'])->name('empresa.edit');
        Route::put('empresa', [EmpresaController::class, 'update'])->name('empresa.update');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
Route::prefix('categorias')->group(function () {
    Route::get('/lista', [App\Http\Controllers\CategoriaController::class, 'lista_categorias'])->name('lista_categoria');
    Route::get('/registrar', [App\Http\Controllers\CategoriaController::class, 'registrar_cat'])->name('registrar_categoria');
    Route::post('/guardar', [App\Http\Controllers\CategoriaController::class, 'guardar_cat'])->name('guardar_categoria');
    Route::get('/editar/{id}', [App\Http\Controllers\CategoriaController::class, 'mostrar_cat'])->name('editar_categoria');
    Route::put('/editar/{id}', [App\Http\Controllers\CategoriaController::class, 'actualizar_cat'])->name('actualizar_categoria');
    Route::delete('/eliminar/{id}', [App\Http\Controllers\CategoriaController::class, 'eliminar_cat'])->name('eliminar_categoria');
});
Route::prefix('chefs')->group(function () {
    Route::get('/lista', [App\Http\Controllers\ChefController::class, 'lista_chefs'])->name('lista_chefs');
    Route::get('/registrar', [App\Http\Controllers\ChefController::class, 'registrar_chef'])->name('registrar_chef');
    Route::post('/guardar', [App\Http\Controllers\ChefController::class, 'guardar_chef'])->name('guardar_chef');
    Route::get('/editar/{id}', [App\Http\Controllers\ChefController::class, 'editar_chef'])->name('editar_chef');
    Route::put('/editar/{id}', [App\Http\Controllers\ChefController::class, 'actualizar_chef'])->name('actualizar_chef');
    Route::delete('/eliminar/{id}', [App\Http\Controllers\ChefController::class, 'eliminar_chef'])->name('eliminar_chef');
});
require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/kos-saya', function () {
    return view('kos_saya');
})->middleware(['auth', 'verified'])->name('kos_saya');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('kos', KosController::class);
Route::get('/kos-saya', [KosController::class, 'index'])->name('kos_saya'); // Akan mengarah ke kos_saya.blade
Route::get('/kos-saya/create', [KosController::class, 'create'])->name('kos.create');
Route::post('/kos-saya', [KosController::class, 'store'])->name('kos.store');
Route::get('/kos-saya/{kos}/edit', [KosController::class, 'edit'])->name('kos.edit');
Route::put('/kos-saya/{kos}', [KosController::class, 'update'])->name('kos.update');
Route::delete('/kos-saya/{kos}', [KosController::class, 'destroy'])->name('kos.destroy');

require __DIR__ . '/auth.php';

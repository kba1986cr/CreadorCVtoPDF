<?php

use App\Http\Controllers\CvController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ruta principal que muestra la vista de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Ruta del dashboard protegida con autenticación y verificación de email
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas protegidas por el middleware de autenticación
Route::middleware('auth')->group(function () {
    // Rutas de recursos para CV (CRUD)
    Route::resource('cv', CvController::class)->except(['index', 'create']);

    // Ruta para generar el PDF del CV
    Route::get('/cv/pdf/{cv}', [CvController::class, 'downloadPdf'])->name('cv.pdf');

    // Rutas para gestionar el perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inclusión de rutas de autenticación (login, registro, etc.)
require __DIR__.'/auth.php';

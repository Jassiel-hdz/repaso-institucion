<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController; // Importante: Agregar esto
use App\Http\Controllers\CarreraController; // Importante: Agregar esto
use App\Http\Controllers\CursoController;    // Importante: Agregar esto
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// --- RUTA PÚBLICA (Punto 6) ---
// Este es el link público: http://127.0.0.1:8000/oferta
Route::get('/oferta', [CarreraController::class, 'index'])->name('carreras.public');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- TUS RUTAS DE RECURSO (Punto 4 y 5) ---
    // Estas generan los links automáticamente
    Route::resource('alumnos', AlumnoController::class);
    Route::resource('carreras', CarreraController::class);
    Route::resource('cursos', CursoController::class);
});

require __DIR__.'/auth.php';
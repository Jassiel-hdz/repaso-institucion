<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CatedraticosController;
use App\Http\Controllers\CourseController; 
use App\Http\Controllers\EnrollmentsController; 

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/oferta', [CatedraticosController::class, 'index'])->name('carreras.public');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('courses', CourseController::class);
    Route::resource('enrollments', EnrollmentsController::class);
});


Route::resource('alumnos', AlumnoController::class);
Route::resource('catedraticos', CatedraticosController::class);
Route::resource('cursos', CursoController::class);

Route::get('/crear-admin', function () {
    User::updateOrCreate(
        ['email' => 'admin@admin.com'],
        ['name' => 'Admin', 'password' => Hash::make('12345678')]
    );
    return "Usuario admin@admin.com con clave 12345678 creado.";
});

require __DIR__.'/auth.php';
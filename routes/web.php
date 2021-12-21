<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Route::get('/', HomeController::class)->name('home');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//RUTA PARA MATRICULAR USUARIOS



//RUTA PARA MOSTRAR AVANCES DEL CURSO POR USUARIO

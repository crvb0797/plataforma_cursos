<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', HomeController::class)->name('home');

Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

Route::get('cursos/{course}', [CourseController::class, 'show'])->name('courses.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//RUTA PARA MATRICULAR USUARIOS
/* Solo se pueden matricular usuarios registrados por eso utilizamos el middleware auth*/

Route::post('cursos/{course}/inscrito', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

//RUTA PARA MOSTRAR AVANCES DEL CURSO POR USUARIO

Route::get('estado-curso/{course}', function ($course) {
    return "Aquí podras llevar control de tu avance";
})->name('courses.status');

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('courses.index');
    }

    public function show(Course $course)
    {
        $similares = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', Course::PUBLICADO)
            ->latest('id')
            ->take(5)
            ->get();
        return view('courses.show', compact('course', 'similares'));
    }

    /* MÉTODO ENCARGADO DE MATRICULAR AL USUARIO AL CURSO */
    /* con esto añadimos registros a la tabla intermedia entre usuarios (estudiants) y cursos */

    public function enrolled(Course $course)
    {
        $course->students()->attach(auth()->user()->id);
        return redirect()->route('courses.status', $course);
    }
}

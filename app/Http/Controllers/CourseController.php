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
}

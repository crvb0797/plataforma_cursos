<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;

    public function render()
    {

        $courses =  Course::where('status', '3')->latest('id')->simplePaginate(8);
        return view('livewire.course-index', compact('courses'));
    }
}

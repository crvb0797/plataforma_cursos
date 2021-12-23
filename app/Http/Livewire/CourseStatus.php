<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseStatus extends Component
{
    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }
    public function render()
    {
        return view('livewire.course-status');
    }
}

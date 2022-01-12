<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class CourseStatus extends Component
{
    public $course, $current, $index, $previous, $next;

    /* Este método me permite recuperar la información que estemos pasando a traves de la URL */
    public function mount(Course $course)
    {
        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
                $this->index = $course->lessons->search($lesson);
                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }
}

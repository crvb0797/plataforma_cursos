<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
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
                /* Lección actual */
                $this->index = $course->lessons->search($lesson);
                /* Lección anterior */
                /* $this->previous = $course->lessons[$this->index - 1]; */
                /* Siguiente lección */
                $this->next = $course->lessons[$this->index + 1];
                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
        $this->index = $this->course->lessons->pluck('id')->search($lesson->id);
        /* Lección anterior */
        /* $this->previous = $this->course->lessons[$this->index - 1]; */
        /* Siguiente lección */
        $this->next = $this->course->lessons[$this->index + 1];
    }
}

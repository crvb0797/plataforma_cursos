<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

class CourseStatus extends Component
{
    public $course, $current;

    /* Este método me permite recuperar la información que estemos pasando a traves de la URL */
    public function mount(Course $course)
    {
        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
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
    }

    /* Propiedades computadas para las lecciones */

    /* Lección actual */
    public function getIndexProperty()
    {
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    /* Lección anterior */
    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;
        } else {
            return $this->course->lessons[$this->index - 1];
        }
    }

    public function getNextProperty()
    {
        if ($this->index == $this->course->lessons->count() - 1) {
            return null;
        } else {
            /* Siguiente lección */
            return $this->course->lessons[$this->index + 1];
        }
    }
}

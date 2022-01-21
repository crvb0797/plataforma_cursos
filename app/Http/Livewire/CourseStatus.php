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
        if (!$this->current) {
            $this->current = $course->lessons->last();
        }
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    /* METODOS */

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }

    public function completed()
    {
        if ($this->current->completed) {
            //Delete register
            $this->current->users()->detach(auth()->user()->id);
        } else {
            //Add register
            $this->current->users()->attach(auth()->user()->id);
        }
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    /* PROPIEDADES COMPUTADAS */

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

    /* Siguiente lección */
    public function getNextProperty()
    {
        if ($this->index == $this->course->lessons->count() - 1) {
            return null;
        } else {
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty()
    {
        $i = 0;
        foreach ($this->course->lessons as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }
        $advance = ($i * 100) / ($this->course->lessons->count());
        return round($advance, 2);
    }
}

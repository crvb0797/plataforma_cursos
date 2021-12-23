<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //POLICY PARA QUE EL USUARIO MATRICULADO YA NO SE PUEDA INSCRIBIR SI NO CONTINUAR CON EL CURSO
    public function enrolled(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }
}

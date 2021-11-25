<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    /* CONSTANTES PARA DEFINIR EN LA MIGRACIÓN DE CURSOS EL STATUS */
    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;
}

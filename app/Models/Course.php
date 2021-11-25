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

    /* RELACIONES 1:N */
    public function review()
    {
        return $this->hasMany('App\Models\Review');
    }


    /* RELACIONES 1:N INVERSAS */
    public function teacher() //🧨 para resolver el error de que no se llama user debemos definir cual es la llave foranea
    {
        return $this->BelongsTo('App\Models\Users', 'user_id');
    }

    public function requirements()
    {
        return $this->HasMany('App\Models\Requirement');
    }

    public function goals()
    {
        return $this->HasMany('App\Models\Goal');
    }

    public function Audience()
    {
        return $this->HasMany('App\Models\Audience');
    }

    public function Sections()
    {
        return $this->HasMany('App\Models\Section');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


    /* RELACIOENS N:N INVERSAS*/
    public function students()
    {
        return $this->belongsToMany('App\Models\Users');
    }
}

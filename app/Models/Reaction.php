<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;
    /* CONSTANTES PARA DEFINIR EN LA MIGRACIÓN DE REACTIONS EL VALOR */
    const LIKE = 1;
    const DISLIKE = 2;

    /* RELACIONES POLIMORFICAS */
    public function reactionable()
    {
        return $this->morphTo();
    }

    /* RELACION 1:N INVERSA */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

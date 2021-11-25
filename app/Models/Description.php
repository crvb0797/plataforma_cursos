<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;

    /* ASIGNACIÓN MASIVA */
    protected $guarded = ['id'];

    /* RELACIONES 1:1 INVERSAS */
    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
}

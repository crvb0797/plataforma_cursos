<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    /* ASIGNACIÓN MASIVA */
    protected $guarded = ['id'];

    /* RELACIONES 1:N */
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}

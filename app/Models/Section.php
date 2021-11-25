<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    /* RELACIONES 1:N */
    public function lessons()
    {
        return $this->hasMany('app\Models\Lesson');
    }

    /* RELACIONES 1:N INVERSAS */
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}

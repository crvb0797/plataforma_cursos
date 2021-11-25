<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    /* RELACION 1:1 */
    public function description()
    {
        return $this->hasOne('App\Models\Description');
    }

    /* RELACIONES N:N */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /* RELACIONES 1:1 POLIMORFICAS */
    public function resource()
    {
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    /* RELACIONES 1:N POLIMORFICAS */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

    /* RELACIONES 1:N INVERSAS  */
    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function platform()
    {
        return $this->belongsTo('App\Models\Platform');
    }
}

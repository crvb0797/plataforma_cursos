<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /* RELACIONES POLIMORFICAS */
    public function commentable()
    {
        return $this->morphTo();
    }

    /* RELACION 1:N POLIMORFICA */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions()
    {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

    /* RELACION 1:N INVERSA */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

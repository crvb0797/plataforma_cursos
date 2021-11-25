<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /* ASIGNACIÓN MASIVA */
    protected $guarded = ['id'];

    /* RELACIONES POLIMORFICAS */
    public function imageable()
    {
        return $this->morphTo();
    }
}

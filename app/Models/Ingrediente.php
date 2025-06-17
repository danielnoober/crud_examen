<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    public function receta()
    {
        return $this->belongsTo(Receta::class);
    }
}

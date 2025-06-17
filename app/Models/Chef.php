<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }
}

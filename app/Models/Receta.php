<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    public function chef()
    {
        return $this->belongsTo(Chef::class);
    }

    // Una receta pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Una receta tiene muchos ingredientes
    public function ingredientes()
    {
        return $this->hasMany(Ingrediente::class);
    }
}

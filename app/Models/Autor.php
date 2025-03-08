<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table = 'autores'; // Indica el nombre correcto de la tabla
    protected $fillable = ['nombre', 'apellidos'];

    public function libros()
    {
        return $this->hasMany(\App\Models\Libro::class);
    }
}
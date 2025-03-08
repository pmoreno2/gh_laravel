<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Autor;
use App\Models\Prestamo;
use App\Models\Reserva;

class Libro extends Model
{
    protected $fillable = ['titulo', 'isbn', 'disponible', 'fecha_publicacion', 'autor_id'];

    public function autores()
    {
        return $this->belongsTo(Autor::class);
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
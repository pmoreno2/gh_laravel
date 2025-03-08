<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Prestamo;
use App\Models\Reserva;

class Usuario extends Model
{
    protected $fillable = ['nombre', 'email'];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
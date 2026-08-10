<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membresia extends Model
{
    protected $table = 'membresias';

    protected $fillable = ['gimnasio_id', 'nombre', 'precio', 'duracion_dias', 'estado'];

    public function gimnasio()
    {
        return $this->belongsTo(Gimnasio::class);
    }

    public function suscripciones()
    {
        return $this->hasMany(Suscripcion::class);
    }
}
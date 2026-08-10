<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    protected $table = 'suscripciones';

    protected $fillable = ['gimnasio_id', 'user_id', 'membresia_id', 'fecha_inicio', 'fecha_fin', 'estado'];

    public function gimnasio()
    {
        return $this->belongsTo(Gimnasio::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function membresia()
    {
        return $this->belongsTo(Membresia::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
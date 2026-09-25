<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';

    protected $fillable = ['gimnasio_id', 'user_id', 'fecha', 'hora_entrada', 'hora_salida'];

    protected $casts = [
        'fecha' => 'date',
    ];

    public function gimnasio()
    {
        return $this->belongsTo(Gimnasio::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}   
<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = ['gimnasio_id', 'name', 'email', 'password', 'rol', 'telefono'];

    protected $hidden = ['password', 'remember_token'];

    public function gimnasio()
    {
        return $this->belongsTo(Gimnasio::class);
    }

    public function suscripciones()
    {
        return $this->hasMany(Suscripcion::class);
    }
}
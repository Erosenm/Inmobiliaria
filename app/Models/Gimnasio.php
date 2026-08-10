<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gimnasio extends Model
{
    protected $table = 'gimnasios';

    protected $fillable = ['nombre', 'slug', 'correo', 'telefono', 'estado'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($gimnasio) {
            if (empty($gimnasio->slug)) {
                $gimnasio->slug = Str::slug($gimnasio->nombre);
            }
        });
    }

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function membresias()
    {
        return $this->hasMany(Membresia::class);
    }
}
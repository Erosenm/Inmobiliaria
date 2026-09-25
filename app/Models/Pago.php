<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $casts = ['pagado_el' => 'datetime',];

    protected $fillable = ['gimnasio_id', 'suscripcion_id', 'monto', 'metodo_pago', 'pagado_el'];

    public function gimnasio()
    {
        return $this->belongsTo(Gimnasio::class);
    }

    public function suscripcion()
    {
        return $this->belongsTo(Suscripcion::class);
    }
}
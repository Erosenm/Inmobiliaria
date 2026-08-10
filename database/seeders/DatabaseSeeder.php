<?php

namespace Database\Seeders;

use App\Models\Gimnasio;
use App\Models\Membresia;
use App\Models\Pago;
use App\Models\Suscripcion;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear un gimnasio de prueba
        $gimnasio = Gimnasio::create([
            'nombre'   => 'Gimnasio Pretorianos',
            'slug'     => 'gimnasio-pretorianos',
            'correo'   => 'contacto@pretorianos.com',
            'telefono' => '70000000',
            'estado'   => 'activo',
        ]);

        // 2. Crear un Administrador para este gimnasio
        $admin = User::create([
            'gimnasio_id' => $gimnasio->id,
            'name'        => 'Administrador Pretorianos',
            'email'       => 'admin@pretorianos.com',
            'password'    => bcrypt('12345678'),
            'rol'         => 'administrador',
            'telefono'    => '71111111',
        ]);

        // 3. Crear un Socio/Cliente de prueba
        $socio = User::create([
            'gimnasio_id' => $gimnasio->id,
            'name'        => 'Juan Pérez',
            'email'       => 'juan@gmail.com',
            'password'    => bcrypt('12345678'),
            'rol'         => 'socio',
            'telefono'    => '72222222',
        ]);

        // 4. Crear una Membresía
        $membresia = Membresia::create([
            'gimnasio_id'   => $gimnasio->id,
            'nombre'        => 'Plan Mensual Pase Libre',
            'precio'        => 150.00,
            'duracion_dias' => 30,
            'estado'        => 'activa',
        ]);

        // 5. Crear una Suscripción para el socio
        $suscripcion = Suscripcion::create([
            'gimnasio_id'  => $gimnasio->id,
            'user_id'      => $socio->id,
            'membresia_id' => $membresia->id,
            'fecha_inicio' => now()->format('Y-m-d'),
            'fecha_fin'    => now()->addDays(30)->format('Y-m-d'),
            'estado'       => 'activa',
        ]);

        // 6. Registrar el Pago de la suscripción
        Pago::create([
            'gimnasio_id'    => $gimnasio->id,
            'suscripcion_id' => $suscripcion->id,
            'monto'          => 150.00,
            'metodo_pago'    => 'efectivo',
            'pagado_el'      => now(),
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Gimnasio;
use App\Models\Membresia;
use App\Models\Pago;
use App\Models\Suscripcion;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear el gimnasio base
        $gimnasio = Gimnasio::create([
            'nombre'   => 'Gimnasio Pretorianos',
            'slug'     => 'gimnasio-pretorianos',
            'correo'   => 'contacto@pretorianos.com',
            'telefono' => '70000000',
            'estado'   => 'activo',
        ]);

        // 2. Super Administrador
        User::create([
            'gimnasio_id' => $gimnasio->id,
            'name'        => 'Super Admin',
            'email'       => 'admin@pretorianos.com',
            'password'    => Hash::make('12345678'),
            'rol'         => 'super_admin',
            'telefono'    => '71111111',
        ]);

        // 3. Personal Administrativo / Recepción
        User::create([
            'gimnasio_id' => $gimnasio->id,
            'name'        => 'Recepción Pretorianos',
            'email'       => 'recepcion@pretorianos.com',
            'password'    => Hash::make('12345678'),
            'rol'         => 'admin',
            'telefono'    => '72222222',
        ]);

        // 4. Cliente
        $cliente = User::create([
            'gimnasio_id' => $gimnasio->id,
            'name'        => 'Juan Pérez',
            'email'       => 'juan@gmail.com',
            'password'    => Hash::make('12345678'),
            'rol'         => 'cliente',
            'telefono'    => '73333333',
        ]);

        // 5. Crear Membresía
        $membresia = Membresia::create([
            'gimnasio_id'   => $gimnasio->id,
            'nombre'        => 'Plan Mensual Pase Libre',
            'precio'        => 150.00,
            'duracion_dias' => 30,
            'estado'        => 'activa',
        ]);

        // 6. Crear Suscripción asociada al cliente
        $suscripcion = Suscripcion::create([
            'gimnasio_id'  => $gimnasio->id,
            'user_id'      => $cliente->id,
            'membresia_id' => $membresia->id,
            'fecha_inicio' => now()->format('Y-m-d'),
            'fecha_fin'    => now()->addDays(30)->format('Y-m-d'),
            'estado'       => 'activa',
        ]);

        // 7. Registrar el Pago de la suscripción
        Pago::create([
            'gimnasio_id'    => $gimnasio->id,
            'suscripcion_id' => $suscripcion->id,
            'monto'          => 150.00,
            'metodo_pago'    => 'efectivo',
            'pagado_el'      => now(),
        ]);
    }
}
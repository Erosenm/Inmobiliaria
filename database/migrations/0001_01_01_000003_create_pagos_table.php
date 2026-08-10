<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gimnasio_id')->constrained('gimnasios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('suscripcion_id')->constrained('suscripciones')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('monto', 10, 2);
            $table->enum('metodo_pago', ['efectivo', 'tarjeta', 'transferencia', 'qr'])->default('efectivo');
            $table->timestamp('pagado_el')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
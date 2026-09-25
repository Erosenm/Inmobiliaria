<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('asistencias', function (Blueprint $table) {
        $table->id();
        $table->foreignId('gimnasio_id')->constrained('gimnasios')->onDelete('cascade')->onUpdate('cascade');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
        $table->date('fecha');
        $table->time('hora_entrada');
        $table->time('hora_salida')->nullable();
        $table->timestamps();

        // Un mismo socio no puede tener dos registros de entrada el mismo día
        $table->unique(['user_id', 'fecha']);
    });
}
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};

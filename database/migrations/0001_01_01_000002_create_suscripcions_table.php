<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gimnasio_id')->constrained('gimnasios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('membresia_id')->constrained('membresias')->onDelete('restrict')->onUpdate('cascade');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->enum('estado', ['activa', 'vencida', 'cancelada'])->default('activa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suscripciones');
    }
};
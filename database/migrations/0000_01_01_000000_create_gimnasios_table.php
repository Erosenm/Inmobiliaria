<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gimnasios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->string('slug', 100)->unique();
            $table->string('correo', 150)->unique();
            $table->string('telefono', 20)->nullable();
            $table->enum('estado', ['activo', 'suspendido'])->default('activo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gimnasios');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gimnasio_id')->constrained('gimnasios')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre', 100);
            $table->decimal('precio', 10, 2);
            $table->integer('duracion_dias');
            $table->enum('estado', ['activa', 'inactiva'])->default('activa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membresias');
    }
};
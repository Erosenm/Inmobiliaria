<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gimnasio_id')->constrained('gimnasios')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 100);
            $table->string('email', 150);
            $table->string('password');
            $table->enum('rol', ['administrador', 'recepcionista', 'socio'])->default('socio');
            $table->string('telefono', 20)->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['gimnasio_id', 'email']);
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
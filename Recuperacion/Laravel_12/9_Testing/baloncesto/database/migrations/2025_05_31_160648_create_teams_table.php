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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('stadium');
            $table->string('coach'); // Nombre del entrenador
            $table->year('founded');
            $table->string('mascot')->nullable(); // Mascota del equipo, puede ser nulo
            $table->integer('championships')->default(0); // Número de campeonatos ganados, por defecto 0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};

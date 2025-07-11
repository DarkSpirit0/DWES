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
        Schema::create('equipo_jugador', function (Blueprint $table) {
        $table->id();
        $table->foreignId('equipo_id')->constrained()->onDelete('cascade');
        $table->foreignId('jugador_id')->constrained()->onDelete('cascade');
        $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_jugador');
    }
};

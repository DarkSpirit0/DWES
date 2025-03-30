<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('age');
            $table->string('position', 50);
            $table->float('height'); // Altura en metros
            $table->float('weight'); // Peso en kg
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('players');
    }
};

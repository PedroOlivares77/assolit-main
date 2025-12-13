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
        Schema::create('usuarios_medicamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->unsignedBigInteger('id_medicamento')->nullable();
            $table->boolean('desayuno')->default(false);
            $table->boolean('comida')->default(false);
            $table->boolean('cena')->default(false);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->nullOnDelete()->nullOnUpdate();
            $table->foreign('id_medicamento')->references('id')->on('medicamentos')->nullOnDelete()->nullOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_medicamentos');
    }
};

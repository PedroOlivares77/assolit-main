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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vivienda')->nullable();
            $table->string('nombre');
            $table->string('apellidos')->nullable();
            $table->date('fecha_nacimiento');
            $table->string('patologia');
            $table->timestamps();
            $table->foreign('id_vivienda')->references('id')->on('viviendas')->nullOnDelete()->nullOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

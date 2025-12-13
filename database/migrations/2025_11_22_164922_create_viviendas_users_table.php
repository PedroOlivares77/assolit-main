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
        Schema::create('viviendas_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_vivienda')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_vivienda')->references('id')->on('viviendas')->nullOnDelete()->nullOnUpdate();
            $table->foreign('id_user')->references('id')->on('users')->nullOnDelete()->nullOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viviendas_users');
    }
};

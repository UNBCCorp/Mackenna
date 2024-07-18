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
        Schema::create('modelo_vehiculo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('placa');
            $table->date('fecha_modelo');
            $table->string('cilindraje');
            $table->foreignId('tipo_combustible_id')->constrained('tipo_combustible');
            $table->string('capacidad_combustible');
            $table->float('cantidad_combustible_actual');
            $table->float('kilometraje_actual');
            $table->float('kilometraje_anterior');
            $table->foreignId('tipo_caja_id')->constrained('tipo_caja');
            $table->foreignId('equipamiento_vehiculo_id')->nullable()->constrained('equipamiento_vehiculo');
            $table->foreignId('accesorio_vehiculo_id')->nullable()->constrained('accesorio_vehiculo');
            $table->foreignId('tipo_itv_id')->nullable()->constrained('tipo_itv');
            $table->string('estado_actual')->nullable()->constrained('estado_vehiculo');
            $table->text('reparaciones')->nullable();
            $table->text('observaciones')->nullable();
            $table->foreignId('grafico_vehiculo_id')->nullable()->constrained('grafico_vehiculo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelo_vehiculo');
    }
};

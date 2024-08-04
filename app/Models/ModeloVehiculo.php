<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloVehiculo extends Model
{
    use HasFactory;

    protected $table = 'modelo_vehiculo';

    protected $fillable = [
        'nombre',
        'tipo_vehiculo',
        'tipo_combustible',
        'capacidad_combustible',
        'tipo_caja',
        'equipamiento_vehiculo',
        'accesorio_vehiculo',
        'tipo_itv',
        'grafico_vehiculo_id',
        'marca',
    ];

    protected $casts = [
        'tipo_vehiculo' => 'array',
        'equipamiento_vehiculo' => 'array',
        'accesorio_vehiculo' => 'array',
    ];
}

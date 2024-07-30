<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    protected $table = 'tarifas'; // Nombre de la tabla

    protected $fillable = [
        'nombre',
        'porcentaje',
        'tipo_vehiculo',
        'users',
    ];

    protected $casts = [
        'tipo_vehiculo' => 'array', // Asegúrate de que 'tipo_vehiculo' se convierta a un array cuando se lea
    ];
    public function getTipoVehiculos()
    {
        return TipoVehiculo::whereIn('id', $this->tipo_vehiculo)->pluck('nombre', 'id')->toArray();
    }
}

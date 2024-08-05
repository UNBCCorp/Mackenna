<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroVehiculo extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'registro_vehiculo';

    // Campos que se pueden asignar de manera masiva
    protected $fillable = [
        'placa',
        'chasis',
        'llave',
        'kilometros',
        'fecha',
        'color',
        'modelo',
        'codigo',
        'notas',
        'equipamiento',
        'accesorios',
        'estado',
        'uso',
        'propietario',
        'sucursal',
        'aparcado',
        'deposito',
        'compania_seguro',
        'riesgo_seguro',
        'poliza_seguro',
        'aseguradora_seguro',
        'asistencia_seguro',
        'telefono_seguro',
        'aviso',
        'documento_1',
        'documento_2',
        'documento_3'
    ];

    // Si no estás utilizando las columnas created_at y updated_at
    public $timestamps = true;

    // Aquí puedes definir las relaciones, accesores, mutadores y otros métodos del modelo
}

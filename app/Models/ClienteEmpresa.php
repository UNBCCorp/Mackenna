<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteEmpresa extends Model
{
    use HasFactory;

    protected $table = 'clientes_empresa';

    protected $fillable = [
        'name', 'tipo_cliente', 'cuenta_contable', 'razon_social', 'sector_economico', 'direccion',
        'codigo_postal', 'municipio', 'pais', 'provincia', 'tipo_documento', 'numero_documento', 'pais_documento',
        'persona_contacto', 'numero_contacto', 'email', 'web', 'sucursal', 'idiomas', 'observaciones', 'medio_pago',
        'dias_credito', 'canal', 'vent_dia', 'vehiculo_propio', 'acuerdos', 'opciones', 'tarifas', 'documento',
        'documento2', 'documento3', 'estado_cliente'
    ];
}

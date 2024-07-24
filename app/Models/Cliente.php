<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'name',
        'tipo_cliente',
        'tipo_identificacion',
        'identificacion',
        'ciudad_expedicion_identificacion',
        'identificacion_pais',
        'fecha_expedicion_identificacion',
        'fecha_caducidad_identificacion',
        'carnet',
        'ciudad_expedicion_carnet',
        'carnet_pais',
        'carnet_fecha_expedicion',
        'carnet_fecha_caducidad',
        'tipo_carnet',
        'ciudad_nacido',
        'pais_nacido',
        'fecha_nacido',
        'indicendias',
        'numero_telefonico',
        'email',
        'foto_identificacion',
        'foto_licencia',
        'foto_cliente',
        'direccion_habitual',
        'codigo_postal_habitual',
        'municipio_habitual',
        'provincia_habitual',
        'pais_habitual',
        'direccion_local',
        'codigo_postal_local',
        'municipio_local',
        'provincia_local',
        'pais_local',
        'conductor_empresa',
        'mailing',
        'estado',
        'medio_pago',
        'observaciones',
        'avisos',
        'canles_restringidos',
        'consentimiento',
        'inhabilidades',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanAccionComunal extends Model
{
    use HasFactory;
    
    protected $table = 'plan_accion_comunals';

    protected $fillable = [
        'uuid',
        'lineas_estrategicas',
        'meta_resultado',
        'indicador_de_resultado',
        'indicador_de_impacto',
        'objetivo_indicador_acumulacion',
        'unidad_de_medida',
        'linea_base',
        'meta_cuatrienio_1',
        'meta_cuatrienio_2',
        'meta_cuatrienio_3',
        'meta_vigencia_pp',
        'coordinador_mr',
        'meta_producto',
        'producto_catalogo_dnp',
        'indicador_producto',
        'objetivo_indicador_acumulacion_producto',
        'unidad_de_medida_producto',
        'linea_base_producto',
        'meta_cuatrienio_1_producto',
        'meta_cuatrienio_2_producto',
        'meta_cuatrienio_3_producto',
        'meta_vigencia_pp_producto',
        'responsable',
    ];
}

<?php

namespace App\Http\Controllers;

use App\Models\PlanAccionComunal;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PlanAccionComunalController extends Controller
{
    public function store(Request $request)
    {
        try {
            $lineasEstrategicasLog = null;
            $metaResultadoLog = null;
            $indicadorResultadoLog = null;
            $indicadorImpactoLog = null;
            $objetivoIndicadorAcumulacionLog = null;
            $unidadDeMedidaLog = null;
            $lineaBaseLog = null;
            $metaCuatrienio1Log = null;
            $metaCuatrienio2Log = null;
            $metaCuatrienio3Log = null;
            $metaVigenciaPpLog = null;
            $coordinadorMrLog = null;
            $metaProductoLog = null;
            $productoCatalogoDnpLog = null;
            $indicadorProductoLog = null;
            $objetivoIndicadorAcumulacionProductoLog = null;
            $unidadDeMedidaProductoLog = null;
            $lineaBaseProductoLog = null;
            $metaCuatrienio1ProductoLog = null;
            $metaCuatrienio2ProductoLog = null;
            $metaCuatrienio3ProductoLog = null;
            $metaVigenciaPpProductoLog = null;
            $responsableLog = null;

            foreach ($request->data as $item) {
                $lineasEstrategicasLog = isset($item["LÍNEAS ESTRATÉGICAS"]) ? $item["LÍNEAS ESTRATÉGICAS"] : $lineasEstrategicasLog;
                $metaResultadoLog = isset($item["META RESULTADO"]) ? $item["META RESULTADO"] : $metaResultadoLog;
                $indicadorResultadoLog = isset($item["INDICADOR DE RESULTADO"]) ? $item["INDICADOR DE RESULTADO"] : $indicadorResultadoLog;
                $indicadorImpactoLog = isset($item["INDICADOR DE IMPACTO"]) ? $item["INDICADOR DE IMPACTO"] : $indicadorImpactoLog;
                $objetivoIndicadorAcumulacionLog = isset($item["OBJETIVO DEL INDICADOR; TIPO DE ACUMULACIÓN"]) ? $item["OBJETIVO DEL INDICADOR; TIPO DE ACUMULACIÓN"] : $objetivoIndicadorAcumulacionLog;
                $unidadDeMedidaLog = isset($item["UNIDAD DE MEDIDA"]) ? $item["UNIDAD DE MEDIDA"] : $unidadDeMedidaLog;
                $lineaBaseLog = isset($item["LINEA BASE"]) ? $item["LINEA BASE"] : $lineaBaseLog;
                $metaCuatrienio1Log = isset($item["META DEL CUATRIENIO 1"]) ? $item["META DEL CUATRIENIO 1"] : $metaCuatrienio1Log;
                $metaCuatrienio2Log = isset($item["META DEL CUATRIENIO 2"]) ? $item["META DEL CUATRIENIO 2"] : $metaCuatrienio2Log;
                $metaCuatrienio3Log = isset($item["META DEL CUATRIENIO 3"]) ? $item["META DEL CUATRIENIO 3"] : $metaCuatrienio3Log;
                $metaVigenciaPpLog = isset($item["META VIGENCIA PP"]) ? $item["META VIGENCIA PP"] : $metaVigenciaPpLog;
                $coordinadorMrLog = isset($item["Coordinador MR"]) ? $item["Coordinador MR"] : $coordinadorMrLog;
                $metaProductoLog = isset($item["META PRODUCTO"]) ? $item["META PRODUCTO"] : $metaProductoLog;
                $productoCatalogoDnpLog = isset($item["PRODUCTO CATÁLOGO DNP"]) ? $item["PRODUCTO CATÁLOGO DNP"] : $productoCatalogoDnpLog;
                $indicadorProductoLog = isset($item["INDICADOR PRODUCTO"]) ? $item["INDICADOR PRODUCTO"] : $indicadorProductoLog;
                $objetivoIndicadorAcumulacionProductoLog = isset($item["OBJETIVO DEL INDICADOR; TIPO DE ACUMULACIÓN_1"]) ? $item["OBJETIVO DEL INDICADOR; TIPO DE ACUMULACIÓN_1"] : $objetivoIndicadorAcumulacionProductoLog;
                $unidadDeMedidaProductoLog = isset($item["UNIDAD DE MEDIDA_1"]) ? $item["UNIDAD DE MEDIDA_1"] : $unidadDeMedidaProductoLog;
                $lineaBaseProductoLog = isset($item["LÍNEA BASE"]) ? $item["LÍNEA BASE"] : $lineaBaseProductoLog;
                $metaCuatrienio1ProductoLog = isset($item["META CUATRIENIO 1"]) ? $item["META CUATRIENIO 1"] : $metaCuatrienio1ProductoLog;
                $metaCuatrienio2ProductoLog = isset($item["META CUATRIENIO 2"]) ? $item["META CUATRIENIO 2"] : $metaCuatrienio2ProductoLog;
                $metaCuatrienio3ProductoLog = isset($item["META CUATRIENIO 3"]) ? $item["META CUATRIENIO 3"] : $metaCuatrienio3ProductoLog;
                $metaVigenciaPpProductoLog = isset($item["META VIGENCIA PP_1"]) ? $item["META VIGENCIA PP_1"] : $metaVigenciaPpProductoLog;
                $responsableLog = isset($item["RESPONSABLE"]) ? $item["RESPONSABLE"] : $responsableLog;

                // Verificar si ya existe
                $exists = PlanAccionComunal::where([
                    ['lineas_estrategicas', $lineasEstrategicasLog],
                    ['meta_resultado', $metaResultadoLog],
                    ['indicador_de_resultado', $indicadorResultadoLog],
                    ['indicador_de_impacto', $indicadorImpactoLog],
                    ['objetivo_indicador_acumulacion', $objetivoIndicadorAcumulacionLog],
                    ['unidad_de_medida', $unidadDeMedidaLog],
                    ['linea_base', $lineaBaseLog],
                    ['meta_cuatrienio_1', $metaCuatrienio1Log],
                    ['meta_cuatrienio_2', $metaCuatrienio2Log],
                    ['meta_cuatrienio_3', $metaCuatrienio3Log],
                    ['meta_vigencia_pp', $metaVigenciaPpLog],
                    ['coordinador_mr', $coordinadorMrLog],
                    ['meta_producto', $metaProductoLog],
                    ['producto_catalogo_dnp', $productoCatalogoDnpLog],
                    ['indicador_producto', $indicadorProductoLog],
                    ['objetivo_indicador_acumulacion_producto', $objetivoIndicadorAcumulacionProductoLog],
                    ['unidad_de_medida_producto', $unidadDeMedidaProductoLog],
                    ['linea_base_producto', $lineaBaseProductoLog],
                    ['meta_cuatrienio_1_producto', $metaCuatrienio1ProductoLog],
                    ['meta_cuatrienio_2_producto', $metaCuatrienio2ProductoLog],
                    ['meta_cuatrienio_3_producto', $metaCuatrienio3ProductoLog],
                    ['meta_vigencia_pp_producto', $metaVigenciaPpProductoLog],
                    ['responsable', $responsableLog],
                ])->exists();

                if ($exists) {
                    continue;
                }

                PlanAccionComunal::create([
                    'uuid' => Uuid::uuid1() . Uuid::uuid4(),
                    'lineas_estrategicas' => $lineasEstrategicasLog,
                    'meta_resultado' => $metaResultadoLog,
                    'indicador_de_resultado' => $indicadorResultadoLog,
                    'indicador_de_impacto' => $indicadorImpactoLog,
                    'objetivo_indicador_acumulacion' => $objetivoIndicadorAcumulacionLog,
                    'unidad_de_medida' => $unidadDeMedidaLog,
                    'linea_base' => $lineaBaseLog,
                    'meta_cuatrienio_1' => $metaCuatrienio1Log,
                    'meta_cuatrienio_2' => $metaCuatrienio2Log,
                    'meta_cuatrienio_3' => $metaCuatrienio3Log,
                    'meta_vigencia_pp' => $metaVigenciaPpLog,
                    'coordinador_mr' => $coordinadorMrLog,
                    'meta_producto' => $metaProductoLog,
                    'producto_catalogo_dnp' => $productoCatalogoDnpLog,
                    'indicador_producto' => $indicadorProductoLog,
                    'objetivo_indicador_acumulacion_producto' => $objetivoIndicadorAcumulacionProductoLog,
                    'unidad_de_medida_producto' => $unidadDeMedidaProductoLog,
                    'linea_base_producto' => $lineaBaseProductoLog,
                    'meta_cuatrienio_1_producto' => $metaCuatrienio1ProductoLog,
                    'meta_cuatrienio_2_producto' => $metaCuatrienio2ProductoLog,
                    'meta_cuatrienio_3_producto' => $metaCuatrienio3ProductoLog,
                    'meta_vigencia_pp_producto' => $metaVigenciaPpProductoLog,
                    'responsable' => $responsableLog,
                ]);
            }
            return response()->json([
                'res' => true,
                'message' => 'Se ha cargado el archivo de plan de acciones comunal correctamente',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'res' => false,
                'message' => 'Error al cargar archivo de plan de acciones comunal',
            ], 200);
        }
    }
}

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
        Schema::create('plan_accion_comunals', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 500);
            $table->string('lineas_estrategicas')->nullable();
            $table->text('meta_resultado')->nullable();
            $table->text('indicador_de_resultado')->nullable();
            $table->text('indicador_de_impacto')->nullable();
            $table->string('objetivo_indicador_acumulacion')->nullable();
            $table->string('unidad_de_medida')->nullable();
            $table->string('linea_base')->nullable();
            $table->string('meta_cuatrienio_1')->nullable();
            $table->string('meta_cuatrienio_2')->nullable();
            $table->string('meta_cuatrienio_3')->nullable();
            $table->string('meta_vigencia_pp')->nullable();
            $table->string('coordinador_mr')->nullable();
            $table->text('meta_producto')->nullable();
            $table->text('producto_catalogo_dnp')->nullable();
            $table->text('indicador_producto')->nullable();
            $table->string('objetivo_indicador_acumulacion_producto')->nullable();
            $table->string('unidad_de_medida_producto')->nullable();
            $table->string('linea_base_producto')->nullable();
            $table->string('meta_cuatrienio_1_producto')->nullable();
            $table->string('meta_cuatrienio_2_producto')->nullable();
            $table->string('meta_cuatrienio_3_producto')->nullable();
            $table->string('meta_vigencia_pp_producto')->nullable();
            $table->string('responsable')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_accion_comunals');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspirantes', function (Blueprint $table) {
            $table->id();
            // SECCION 01
            $table->string('numero_convocatoria')->nullable()->default(null);
            $table->string('entidad')->nullable();
            $table->string('municipio')->nullable();
            $table->string('localidad')->nullable();
            $table->string('sede')->nullable()->default(null);
            $table->string('tipo_sede')->nullable()->default(null);
            // SECCION 02
            $table->string('clave_elector')->nullable();
            $table->string('seccion_electoral')->nullable();
            $table->string('rfc')->nullable()->default(null);
            $table->string('curp')->nullable()->default(null);
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('nombre')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('edad')->nullable();
            $table->string('genero')->nullable();
            $table->string('persona_lgbtttiq')->nullable()->default(null);
            $table->string('otro_lgbtttiq')->nullable()->default(null);
            $table->string('dom_calle')->nullable();
            $table->string('dom_num_exterior')->nullable();
            $table->string('dom_num_interior')->nullable()->default(null);
            $table->string('dom_colonia')->nullable();
            $table->string('dom_municipio')->nullable();
            $table->string('dom_localidad')->nullable();
            $table->string('tel_fijo')->nullable();
            $table->string('tel_celular')->nullable();
            // SECCION 03
            $table->string('ultimo_grado_estudio')->nullable();
            $table->string('realiza_estudios')->nullable();
            $table->string('medio_convocatoria')->nullable();
            $table->string('motivo_secae')->nullable();
            $table->json('experiencia_laboral')->nullable()->default(null);
            // SECCION 04
            $table->string('p1_proceso_electoral')->nullable()->default(null);
            $table->string('p1_1_cual')->nullable()->default(null);
            $table->string('p1_2_forma')->nullable()->default(null);
            $table->string('p2_disponibilidad')->nullable()->default(null);
            $table->string('p3_finsemana')->nullable()->default(null);
            $table->string('p4_campo')->nullable()->default(null);
            $table->string('p5_milita')->nullable()->default(null);
            $table->string('p6_como_representante')->nullable()->default(null);
            $table->string('p7_familiar')->nullable()->default(null);
            $table->string('p8_servidora')->nullable()->default(null);
            $table->string('p9_experiencia')->nullable()->default(null);
            $table->string('p10_impartido')->nullable()->default(null);
            $table->string('p11_habla_lindigena')->nullable()->default(null);
            $table->string('p11_1_cual')->nullable()->default(null);
            $table->string('p12_conducir')->nullable()->default(null);
            $table->string('p12_1_licencia')->nullable()->default(null);
            $table->string('p12_2_vehiculo')->nullable()->default(null);
            $table->string('p12_3_marca')->nullable()->default(null);
            $table->string('p12_4_prestar')->nullable()->default(null);
            $table->string('p13_tiempo_traslado')->nullable()->default(null);
            $table->string('p14_acceso_internet')->nullable()->default(null);
            $table->string('p15_discapacidad')->nullable()->default(null);
            $table->string('p15_1_tipodiscapacidad')->nullable()->default(null);
            $table->string('p15_2_otradiscapacidad')->nullable()->default(null);
            $table->string('p16_utilizar_celular')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspirantes');
    }
};

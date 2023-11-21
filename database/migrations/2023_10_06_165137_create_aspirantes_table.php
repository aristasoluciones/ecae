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
            $table->string('fecha_recepcion')->nullable();
            $table->string('numero_convocatoria')->nullable();
            $table->string('folio_aspirante')->nullable();
            $table->string('entidad')->nullable();
            $table->string('municipio')->nullable();
            $table->string('localidad')->nullable();
            $table->string('sede')->nullable();
            $table->string('sede_fija')->nullable();
            $table->string('sede_alterna')->nullable();
            // SECCION 02
            $table->string('clave_elector')->nullable();
            $table->string('seccion_electoral')->nullable();
            $table->string('rfc')->nullable();
            $table->string('curp')->nullable();
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->string('nombre')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('edad')->nullable();
            $table->string('genero')->nullable();
            $table->string('sexo')->nullable();
            $table->string('genero')->nullable();
            $table->string('dom_calle')->nullable();
            $table->string('dom_num_exterior')->nullable();
            $table->string('dom_num_interior')->nullable();
            $table->string('dom_colonia')->nullable();
            $table->string('dom_municipio')->nullable();
            $table->string('dom_localidad')->nullable();
            $table->string('tel_fijo')->nullable();
            $table->string('tel_celular')->nullable();
            // SECCION 03
            $table->string('ultimo_grado_estudio')->nullable();
            $table->string('nivel_grado_estudio')->nullable();
            $table->string('grado_concluido')->nullable();
            $table->string('otro_grado_estudio')->nullable();
            $table->string('realiza_estudios')->nullable();
            $table->string('medio_convocatoria')->nullable();
            $table->string('motivo_secae')->nullable();
            $table->string('experiencia_laboral')->nullable();
            $table->string('tipos_de_medios')->nullable();
            // SECCION 04
            $table->string('p1_proceso_electoral')->nullable();
            $table->string('p1_1_cual')->nullable();
            $table->string('p1_2_forma')->nullable();
            $table->string('p2_disponibilidad')->nullable();
            $table->string('p3_finsemana')->nullable();
            $table->string('p4_campo')->nullable();
            $table->string('p5_milita')->nullable();
            $table->string('p6_como_representante')->nullable();
            $table->string('p7_familiar')->nullable();
            $table->string('p8_servidora')->nullable();
            $table->string('p9_experiencia')->nullable();
            $table->string('p10_impartido')->nullable();
            $table->string('p11_habla_lindigena')->nullable();
            $table->string('p11_1_cual')->nullable();
            $table->string('p12_conducir')->nullable();
            $table->string('p12_1_licencia')->nullable();
            $table->string('p12_2_vehiculo')->nullable();
            $table->string('p12_3_marca')->nullable();
            $table->string('p12_4_prestar')->nullable();
            $table->string('p13_tiempo_traslado')->nullable();
            $table->string('p14_acceso_internet')->nullable();
            $table->string('p15_discapacidad')->nullable();
            $table->string('p15_1_tipodiscapacidad')->nullable();
            $table->string('p15_2_otradiscapacidad')->nullable();
            $table->string('p16_utilizar_celular')->nullable();
            $table->timestamps();
            $table->softDeletes();      
            
            /* $table->string('')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            // Cuestionario curricular
            $table->string('foto')->nullable();
            $table->text('medios_contacto')->nullable(); // json con los registros de medios de contacto
            $table->string('maximo_estudio')->nullable(); // Máximo grado de estudios
            $table->string('maximo_estudio_estatus')->nullable(); // Estatus del máximo grado de estudios
            $table->text('historia_profesional')->nullable(); // Historia profesional (Máximo 5000 caracteres)
            $table->text('trayectoria_politica')->nullable(); // Trayectoria política (Máximo 5000 caracteres)
            $table->text('porque_desea_el_cargo')->nullable(); // Una descruipción de por qué desea el cargo (Máximo 2500 caracteres)
            $table->text('propuesta1')->nullable(); // Propuesta política 1 (Máximo 1600 caracteres)
            $table->text('propuesta2')->nullable(); // Propuesta política 2 (Máximo 1600 caracteres)
            $table->text('propuesta_gen_disc')->nullable(); // Popuesta en materia de género o de grupos discriminados
            $table->string('email')->nullable(); // Este correo no se publica, es para aclaraciones
            // Cuestionario de identidad
            $table->string('autoadscripcion_indigena')->nullable(); // Sí, no o prefiere no contestar
            $table->string('discapacidad')->nullable(); // Sí, no o prefiere no contestar
            $table->string('temporalidad_discapacidad')->nullable(); // Temporal o permanente
            $table->string('tipo_discapacidad')->nullable(); // Física, sensorial, mental, intelectual, otra o prefiere no contestar
            $table->string('otra_discapacidad')->nullable(); // Dato en caso de se otra la respuesta anterior
            $table->string('impedimento_discapacidad')->nullable(); // Checar descripción abajo
            $table->string('otro_impedimento')->nullable(); //
            $table->string('afromexicana')->nullable(); // Sí, no o prefiere no contestar
            $table->string('diversidad_sexual')->nullable(); // Sí, no o prefiere no contestar
            $table->string('tipo_diversidad_sexual')->nullable(); // Checar descripción abajo
            $table->string('otro_tipo_div_sexual')->nullable(); //
            $table->string('migrante')->nullable(); // Sí, no o prefiere no contestar
            $table->string('entidad_nacimiento')->nullable(); // Entidad de nacimiento en caso de migrante (desplegar 32 entidades)
            $table->string('pais_residencia')->nullable(); // País de residencia
            $table->string('tiempo_residencia')->nullable(); // 0 a 5, 6 a 15, más de 15 años
            $table->string('motivo_residencia')->nullable(); // Familiar, estudio, trabajo, otro o prefiero no contestar
            $table->string('otro_motivo_residencia')->nullable(); // Descripción en caso de ser otra la respuesta anterior 
            $table->string('regular_al_migrar')->nullable(); // Sí o no */
            
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

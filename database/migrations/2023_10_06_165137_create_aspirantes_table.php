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
            $table->string('estatus_publicacion')->nullable();
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
            $table->string('regular_al_migrar')->nullable(); // Sí o no
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

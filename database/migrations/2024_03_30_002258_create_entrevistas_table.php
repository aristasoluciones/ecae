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
        Schema::create('entrevistas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aspirante_id')->constrained('aspirantes');
            $table->string('habla_indigena', 2);
            $table->string('cual_lengua_indigena', 50)->nullable()->default(null);
            $table->string('motivo_participar');
            $table->string('disponibilidad',2);
            $table->string('trabajo_campo',2);
            $table->string('participo_pe',2);
            $table->string('cargo_tiempo_donde_pe')->nullable()->default(null);
            $table->string('colaborado_pp_oc',2);
            $table->string('cargo_tiempo_donde_pp_oc')->nullable()->default(null);
            $table->string('tipo',4)->comment('SEL,CAEL');
            $table->json('competencias');
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
        Schema::dropIfExists('entrevistas');
    }
};

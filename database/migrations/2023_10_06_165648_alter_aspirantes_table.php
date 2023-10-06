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
        Schema::table('aspirantes', function (Blueprint $table) {


            $table->json('otra_formacion')->nullable()->default(null)->after('maximo_estudio_estatus');
            $table->string('estatus_publicacion')->default('En captura')->change();

            // FROM SERC
            $table->string('clave_elector', 30)->after('id');
            $table->unsignedTinyInteger('edad')->after('apellido2');
            $table->string('sexo',20)->after('edad');
            $table->string('cargo')->after('clave_elector');
            $table->string('partido')->after('cargo');
            $table->string('distrito')->nullable()->default(null)->after('partido');
            $table->string('tipo_candidatura')->after('distrito'); // DE SERC tipo de elecciones[Gobernador,Diputaciones...etc]
            //$table->json('respuestas')->nullable()->default(null)->after('email');
        });
    }

    /**clear
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aspirantes', function (Blueprint $table) {

            $table->dropColumn([
                'clave_elector',
                'edad',
                'sexo',
                'cargo',
                'otra_formacion',
                'partido',
                'distrito',
                'tipo_candidatura'
            ]);
        });
    }

};

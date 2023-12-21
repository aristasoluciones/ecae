<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


use Illuminate\Support\Facades\DB;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        DB::table('documentos')->truncate();
        Schema::enableForeignKeyConstraints();

        $documentos =  [
            'En su caso, Solicitud correctamente llenada y firmada',
            'Acta de nacimiento (original o copia certificada y copia simple), o en su caso, Carta de Naturalización',
            'Credencial para Votar o comprobante de trámite',
            'Comprobante de domicilio',
            'Constancia de estudios (no tira de materias)',
            'Declaratoria bajo protesta de decir verdad (firmada)',
            'Copia de la Clave Única del Registro de Población (CURP)',
            'Copia del Registro Federal de Contribuyentes (RFC)',
            'Tres fotografías tamaño infantil a color o en blanco y negro*',
            'Carta que acredite su experiencia como docente, manejo o trato de grupos de personas (el no contar con ella no será causa de exclusión de la persona aspirante)',
            'Constancia de participación en algún Proceso Electoral Concurrente, Federal o Local',
            'Licencia de manejo vigente (el no contar con ella no será causa de exclusión de la persona aspirante)'
        ];


        foreach ($documentos as $documento) {
            Documento::create(['nombre' => $documento]);
        }

    }
}

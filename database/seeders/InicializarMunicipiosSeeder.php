<?php

namespace Database\Seeders;

use App\Imports\MunicipiosImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class InicializarMunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('municipios')->truncate();
        Schema::enableForeignKeyConstraints();

        Excel::import(new MunicipiosImport, storage_path('app/catalogos/municipios.xlsx'));
    }
}

<?php

namespace Database\Seeders;

use App\Imports\ConsejosImport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;

class InicializarConsejosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('consejos')->truncate();
        Schema::enableForeignKeyConstraints();

        Excel::import(new ConsejosImport, storage_path('app/catalogos/consejos.xlsx'));
    }
}

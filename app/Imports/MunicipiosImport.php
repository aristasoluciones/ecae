<?php

namespace App\Imports;

use App\Models\Municipio;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MunicipiosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $claveMun = intval($row['cve_mun']);
        $prefix = "";

        if ($claveMun < 10)
            $prefix = "00";
        elseif($claveMun >=10 && $claveMun < 100)
            $prefix = "0";

        return new Municipio([
            'cve_ent' => trim($row['cve_ent']),
            'cve_mun' => $prefix.$claveMun,
            'nombre' => trim($row['nom_mun']),
        ]);
    }

}

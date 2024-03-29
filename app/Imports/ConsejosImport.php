<?php

namespace App\Imports;

use App\Models\Consejo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ConsejosImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $claveMun = intval($row['clave_municipio']);
        /*$prefix = "";

        if ($claveMun < 10)
            $prefix = "00";
        elseif($claveMun >=10 && $claveMun < 100)
            $prefix = "0";
*/

        return new Consejo([
            'tipo' => 'Municipal',
            'cve_mun' => $claveMun,
            'numero_plaza_sel' => $row['sel'] ?? 0,
            'numero_plaza_cael' => $row['cael'] ?? 0,
        ]);
    }
}

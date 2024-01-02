<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AspirantesExport implements FromView
{
    protected $rows;
    public function __construct($rows) {
        $this->rows = $rows;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.aspirantes',[
            'rows' => $this->rows
        ]);
    }
}

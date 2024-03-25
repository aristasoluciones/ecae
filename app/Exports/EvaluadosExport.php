<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class EvaluadosExport implements FromView, ShouldAutoSize,WithColumnWidths,WithDrawings,WithEvents
{

    protected $rows;
    protected $consejo;
    public function __construct($rows, $consejo) {
        $this->rows    = $rows;
        $this->consejo = $consejo;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.evaluados',[
            'rows' => $this->rows,
            'consejo' => $this->consejo
        ]);
    }

    public function columnWidths(): array
    {
       return [
           'A' => 10,
           'B' => 17,
           'C' => 20,
           'D' => 20,
           'E' => 20,
           'F' => 10,
           'G' => 20,
           'H' => 20,
           'i' => 11,
       ];
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo iepc');
        $drawing->setDescription('logo iepc');
        $drawing->setPath(public_path('/imgs/logoIEPC.png'));
        $drawing->setHeight(80);
        $drawing->setCoordinates('A2');

        $drawing2 = new Drawing();
        $drawing2->setName('Logo ople');
        $drawing2->setDescription('logo ople');
        $drawing2->setPath(public_path('/imgs/ople.png'));
        $drawing2->setHeight(80);
        $drawing2->setCoordinates('H2');


        return [$drawing, $drawing2 ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()
                    ->getStyle('A9:I9')
                    ->applyFromArray([ 'alignment' => ['wrapText' => true]]);
            },
        ];
    }
}

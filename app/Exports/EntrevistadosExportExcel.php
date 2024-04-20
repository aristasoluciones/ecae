<?php

namespace App\Exports;

use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class EntrevistadosExportExcel implements FromView, ShouldAutoSize,WithColumnWidths,WithDrawings,WithEvents,WithStyles
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
        return view('exports.entrevistados-excel',[
            'rows' => $this->rows,
            'consejo' => $this->consejo
        ]);
    }

    public function columnWidths(): array
    {
       return [
           'A' => 6,
           'B' => 6,
           'C' => 15,
           'D' => 15,
           'E' => 15,
           'F' => 8,
           'G' => 15,
           'H' => 5,
           'I' => 5,
       ];
    }
    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo iepc');
        $drawing->setDescription('logo iepc');
        $drawing->setPath(public_path('/imgs/logoIEPC.png'));
        $drawing->setHeight(70);
        $drawing->setWidth(70);
        $drawing->setCoordinates('A2');

        $drawing2 = new Drawing();
        $drawing2->setName('Logo ople');
        $drawing2->setDescription('logo ople');
        $drawing2->setPath(public_path('/imgs/ople.png'));
        $drawing2->setWidth(60);
        $drawing2->setHeight(60);
        $drawing2->setCoordinates('H2');


        return [$drawing, $drawing2 ];
    }


    public function registerEvents(): array
    {
        $totalRows = count($this->rows);
        return [
            AfterSheet::class => function(AfterSheet $event) use($totalRows){
                $event->sheet->getDelegate()
                    ->getStyle('A9:I9')
                    ->applyFromArray([
                        'alignment' => ['wrapText' => true],
                    ]);
                $event->sheet->getDelegate()
                    ->getStyle('A1:I8')
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => 'FFFFFF']
                            ]
                        ]
                    ]);

                $rowPie = $totalRows + 11;
                $rowPieFin = $rowPie + 6;
                $event->sheet->getDelegate()
                    ->getStyle('A'.$rowPie.':I'.$rowPieFin)
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => 'FFFFFF']
                            ]
                        ]
                    ]);
            },

        ];
    }

    public function styles(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $sheet)
    {
        return [

            // Styling an entire column.
            'A'  => ['font' => ['size' => 7]],
            'B'  => ['font' => ['size' => 7]],
            'C'  => ['font' => ['size' => 7]],
            'D'  => ['font' => ['size' => 7]],
            'E'  => ['font' => ['size' => 7]],
            'F'  => ['font' => ['size' => 7]],
            'G'  => ['font' => ['size' => 7]],
            'H'  => ['font' => ['size' => 7]],
            'I'  => ['font' => ['size' => 7]],
        ];
    }
}

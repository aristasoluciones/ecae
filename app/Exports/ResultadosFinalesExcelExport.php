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

class ResultadosFinalesExcelExport implements FromView, ShouldAutoSize,WithColumnWidths,WithDrawings,WithEvents,WithStyles
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
        return view('exports.resultados_finales_excel',[
            'rows' => $this->rows,
            'consejo' => $this->consejo
        ]);
    }

    public function columnWidths(): array
    {
       return [
           'A' => 8,
           'B' => 8,
           'C' => 12,
           'D' => 12,
           'E' => 12,
           'F' => 15,
           'G' => 15,
           'H' => 15,
           'I' => 15,
           'J' => 5,
           'K' => 5,
           'L' => 5,
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
        $drawing2->setCoordinates('J2');


        return [$drawing, $drawing2 ];
    }


    public function registerEvents(): array
    {
        $totalRows = count($this->rows);
        return [
            AfterSheet::class => function(AfterSheet $event) use($totalRows){
                $event->sheet->getDelegate()
                    ->getStyle('A9:J9')
                    ->applyFromArray([
                        'alignment' => ['wrapText' => true],
                    ]);
                $event->sheet->getDelegate()
                    ->getStyle('A1:L8')
                    ->applyFromArray([
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => ['argb' => 'FFFFFF']
                            ]
                        ]
                    ]);

                $rowPie = $totalRows + 11;
                $rowPieFin = $rowPie + 5;
                $event->sheet->getDelegate()
                    ->getStyle('A'.$rowPie.':L'.$rowPieFin)
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
            'J'  => ['font' => ['size' => 7]],
            'K'  => ['font' => ['size' => 7]],
            'L'  => ['font' => ['size' => 7]],
        ];
    }
}

<?php

namespace App\Exports;

use App\Models\Dispensasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class DispensasiExport implements FromCollection, WithHeadings, WithMapping
{
    protected $startDate;
    protected $endDate;
    protected $filterType;
    protected $exportTypes;

    public function __construct($startDate, $endDate, $filterType, $exportTypes)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->filterType = $filterType;
        $this->exportTypes = $exportTypes;
    }

    public function collection()
    {
        $query = Dispensasi::with('santri');
    
        switch ($this->filterType) {
            case 'day':
                $query->whereBetween('created_at', [
                    $this->startDate->startOfDay(),
                    $this->endDate->endOfDay()
                ]);
                break;
            case 'month':
                $query->whereYear('created_at', $this->startDate->year)
                      ->whereMonth('created_at', $this->startDate->month);
                break;
            case 'year':
                $query->whereYear('created_at', $this->startDate->year);
                break;
        }
    
        if (!in_array('semua', $this->exportTypes)) {
            $query->whereIn('status', $this->exportTypes);
        }
    
        return $query->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jenjang',
            'Kamar',
            'Pulang Tanggal',
            'Kembali Tanggal',
            'Status',
            'Keterangan',
            'No Telp',
        ];
    }

    public function map($dispensasi): array
    {
        return [
            $dispensasi->santri->nama,
            $dispensasi->santri->jenjang,
            $dispensasi->santri->kamar,
            $dispensasi->pulang_tanggal,
            $dispensasi->kembali_tanggal,
            ucfirst($dispensasi->status),
            $dispensasi->keterangan,
            $dispensasi->no_telp,
        ];
    }
}
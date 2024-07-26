<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ExportSantri implements FromCollection, WithHeadings, WithStyles
{
    protected $santri;

    public function __construct($santri)
    {
        $this->santri = $santri;
    }

    public function collection()
    {
        // Tambahkan nomor urut
        $santriWithNumbers = $this->santri->map(function($item, $key) {
            return [
                'id_santri' => $item->id_santri,
                'nama' => $item->nama,
                'nik' => $item->nik,
                'jenis_kelamin' => $item->jenis_kelamin,
                'kamar' => $item->kamar,
                'jenjang' => $item->jenjang,
                'tempat_lahir' => $item->tempat_lahir,
                'tanggal_lahir' => $item->tanggal_lahir,
                'alamat' => $item->alamat,
                'provinsi' => $item->provinsi,
                'kabupaten' => $item->kabupaten,
                'nama_ayah' => $item->nama_ayah,
                'nama_ibu' => $item->nama_ibu,
                'nomer_telp_orangtua' => $item->nomer_telp_orangtua,
                'no_kk' => $item->no_kk,
                'status' => $item->status
            ];
        });

        return $santriWithNumbers;
    }

    public function headings(): array
    {
        return [
            'ID Santri',
            'Nama',
            'NIK',
            'Jenis Kelamin',
            'Kamar',
            'Jenjang',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Alamat',
            'Provinsi',
            'Kabupaten',
            'Nama Ayah',
            'Nama Ibu',
            'Nomer Telp Orangtua',
            'No KK',
            'Status'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $cellRange = 'A1:Q' . ($this->santri->count() + 1); // Mengatur range untuk semua sel

        $sheet->getStyle($cellRange)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        $sheet->getStyle('A1:Q1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFFFF'], // Warna teks putih
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FF0000FF', // Warna background biru
                ]
            ],
        ]);

        return [];
    }
}

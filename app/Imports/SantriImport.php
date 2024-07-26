<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SantriImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Santri([
            'id_santri' => $row['id_santri'],
            'nama' => $row['nama'],
            'nik' => $row['nik'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'kamar' => $row['kamar'],
            'jenjang' => $row['jenjang'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'alamat' => $row['alamat'],
            'provinsi' => $row['provinsi'],
            'kabupaten' => $row['kabupaten'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'nomer_telp_orangtua' => $row['nomer_telp_orangtua'],
            'no_kk' => $row['no_kk'],
            'status' => $row['status'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}

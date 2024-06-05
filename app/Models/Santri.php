<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_santri',
        'nama',
        'image',
        'nik',
        'jenis_kelamin',
        'kamar',
        'jenjang',
        'tempat_lahir',
        'tanggal_lahir', // <- Add a comma here
        'alamat',
        'provinsi',
        'kabupaten',
        'nama_ayah',
        'nama_ibu',
        'nomer_telp_orangtua',
        'no_kk',
        'status',
    ];
}

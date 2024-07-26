<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_santri',
        'nama',
        'image',
        'nik',
        'jenis_kelamin',
        'kamar',
        'jenjang',
        'tempat_lahir',
        'tanggal_lahir', // Koma terakhir dihapus
        'alamat',
        'provinsi',
        'kabupaten',
        'nama_ayah',
        'nama_ibu',
        'nomer_telp_orangtua',
        'no_kk',
        'status',
    ];

    public function dispensasi()
    {
        return $this->hasMany(Dispensasi::class, 'id_santri');
    }
}
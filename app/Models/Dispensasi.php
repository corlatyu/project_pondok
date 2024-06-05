<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispensasi extends Model
{
    use HasFactory;

    protected $table = 'dispensasi';

    protected $fillable = [
        'id_santri',
        'nama',
        'jenjang',
        'kamar',
        'pulang_tanggal',
        'kembali_tanggal',
        'status',
        'keterangan',
        'no_telp',
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class, 'id_santri');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PendirianLks extends Model
{
    use HasFactory;

    protected $fillable = [
        'identitas_lks_id',
        'tempat_didirikan',
        'tanggal',
        'bulan',
        'tahun',
        'nomor_akta',
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}

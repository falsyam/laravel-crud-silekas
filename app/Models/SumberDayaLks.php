<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SumberDayaLks extends Model
{
    protected $table = 'sumber_daya_lks';

    protected $fillable = [
        'identitas_lks_id',
        'prasarana_bangunan_kantor',
        'status_bangunan_kantor',
        'status_bangunan_kantor_lain',
        'papan_nama',
        'papan_data',
        'perlengkapan_kantor',
        'ruang_konseling',
        'ruang_diagnosa',
        'ruang_teknis_lainnya',
        'ruang_makan',
        'ruang_kesehatan',
        'ruang_umum_lainnya',
        'peralatan_komunikasi',
        'instalasi_listrik',
        'sarana_penunjang_lainnya',
        'mobil',
        'motor',
        'transportasi_lainnya',
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}

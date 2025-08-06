<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';

    protected $fillable = [
        'pengajuan_lks_id',
        'nomor_surat',
        'tanggal_penerbitan',
        'bulan_penerbitan',
        'tahun_penerbitan',
        'masa_berlaku',
    ];

    public function pengajuanLks()
    {
        return $this->belongsTo(PengajuanLks::class);
    }
}

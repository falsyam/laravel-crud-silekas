<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanLks extends Model
{
    protected $fillable = [
        'identitas_lks_id',
        'tipe_pengajuan',
        'status',
        'catatan',
        'tanggal_pengajuan',
        'kode_unik',
    ];

    public function identitasLks()
    {
        return $this->belongsTo(IdentitasLks::class,'identitas_lks_id');
    }

    public function surat()
    {
        return $this->hasOne(Surat::class);
    }
}
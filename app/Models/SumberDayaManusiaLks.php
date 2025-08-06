<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SumberDayaManusiaLks extends Model
{
    protected $table = 'sumber_daya_manusia_lks';

    protected $fillable = [
        'identitas_lks_id',
        'jumlah_pembina', 'jumlah_pengurus', 'jumlah_pengawas', 'keterangan_lainnya', 'jumlah_lainnya',
        'jumlah_pekerja_sosial', 'jumlah_teknis_lainnya', 'jumlah_administrasi', 'jumlah_penunjang',
        'keterangan_pelaksana_lainnya', 'jumlah_pelaksana_lainnya',
        'modal_awal', 'iuran_anggota', 'hasil_usaha',
        'donatur', 'dunia_usaha', 'zakat',
        'bantuan_lembaga', 'bantuan_usaha', 'bantuan_pemerintah'
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}


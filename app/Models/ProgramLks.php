<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramLks extends Model
{
    use HasFactory;

    protected $table = 'program_lks';

    protected $fillable = [
        'identitas_lks_id',

        // Sasaran
        'sasaran_perseorangan',
        'sasaran_keluarga',
        'sasaran_kelompok',
        'sasaran_masyarakat',

        // Permasalahan sosial
        'masalah_kemiskinan',
        'masalah_ketelantaran',
        'masalah_disabilitas',
        'masalah_keterpencilan',
        'masalah_tunakepribadian',
        'masalah_bencana',
        'masalah_kekerasan',
        'masalah_lainnya',

        // Jenis pelayanan
        'rehabilitasi_sosial',
        'pemberdayaan_sosial',
        'perlindungan_sosial',
        'jaminan_sosial',

        // Pelayanan khusus
        'pelayanan_pendidikan',
        'detail_pelayanan_pendidikan',
        'pelayanan_kesehatan',
        'detail_pelayanan_kesehatan',
        'pelayanan_keagamaan',
        'detail_pelayanan_keagamaan',
        'layanan_lainnya',

        // Sistem pelayanan
        'dalam_lembaga',
        'luar_lembaga',
        'sistem_lainnya',

        // Lokasi pelayanan
        'lokasi_pelayanan',
        'detail_lokasi_pelayanan',
    ];

    // Relasi ke Identitas LKS
    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class, 'identitas_lks_id');
    }
}

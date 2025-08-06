<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalitasLks extends Model
{
    use HasFactory;

    protected $table = 'legalitas_lks'; // Opsional jika nama tabel sudah sesuai

    protected $fillable = [
        'identitas_lks_id',
        'anggaran_dasar',
        'anggaran_rt',
        'akta_pendirian',
        'akta_pendirian_lks_tidak',
        'nama_notaris_tidak',
        'nomor_akta_tidak',
        'nomor_surat_keterangan_terdaftar',
        'akta_pendirian_lks_berbadan',
        'nama_notaris_berbadan',
        'nomor_akta_berbadan',
        'pengesahan_akta_pendirian',
        'nomor_pengesahan',
        'lembaran_negara',
        'nomor_lembaran_negara',
        'ket_domisili',
        'sumber_ket_domisili',
        'tanda_pendaftaran',
        'nama_instansi',
        'nomor_tanda_pendaftaran',
        'npwp',
        'nomor_npwp',
        'rekening',
        'nama_bank',
        'nomor_rekening',
        'nama_rekening',
    ];

    // Optional: relasi ke IdentitasLks
    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class, 'identitas_lks_id');
    }
}
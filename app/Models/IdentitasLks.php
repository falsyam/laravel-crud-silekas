<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentitasLks extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lks',
        'domisili',
        'provinsi',
        'kab_kota',
        'nama_pengisi',
        'jabatan',
        'telepon_pengisi',
        'email',
    ];

    // Relasi ke tabel lain
    public function dataUmum()
    {
        return $this->hasOne(DataUmumLks::class, 'identitas_lks_id');
    }
    public function pengajuan()
    {
        return $this->hasOne(PengajuanLks::class, 'identitas_lks_id');
    }

    public function kontak()
    {
        return $this->hasOne(KontakLks::class, 'identitas_lks_id');
    }

    public function pendirian()
    {
        return $this->hasOne(PendirianLks::class, 'identitas_lks_id');
    }

    public function pengurus()
    {
        return $this->hasOne(PengurusLks::class, 'identitas_lks_id');
    }

    public function jatiDiri()
    {
        return $this->hasOne(JatiDiriLks::class, 'identitas_lks_id');
    }
    public function legalitas()
    {
        return $this->hasOne(LegalitasLks::class, 'identitas_lks_id');
    }
    public function program()
    {
        return $this->hasOne(ProgramLks::class, 'identitas_lks_id');
    }
    public function pelayanan()
    {
        return $this->hasMany(PelayananLks::class, 'identitas_lks_id');
    }
    public function pelayananlain()
    {
        return $this->hasMany(PelayananLainLks::class, 'identitas_lks_id');
    }
    public function usahapenunjang()
    {
        return $this->hasMany(UsahaPenunjangLks::class, 'identitas_lks_id');
    }
    public function sumberdaya()
    {
        return $this->hasOne(SumberDayaLks::class, 'identitas_lks_id');
    }
    public function sumberdana()
    {
        return $this->hasOne(SumberDanaLainLks::class, 'identitas_lks_id');
    }
    public function sumberdayamanusia()
    {
        return $this->hasOne(SumberDayaManusiaLks::class, 'identitas_lks_id');
    }
    public function jejaring()
    {
        return $this->hasMany(JejaringLks::class, 'identitas_lks_id');
    }

}



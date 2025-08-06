<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class DataUmumLks extends Model
{
    use HasFactory;

    protected $fillable = [
        'identitas_lks_id',
        'nama_lks',
        'singkatan',
        'alamat_lks',
        'jalan_nomor',
        'desa_kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kodepos',
    ];

    public function identitasLks()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}
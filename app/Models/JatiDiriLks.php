<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class JatiDiriLks extends Model
{
    use HasFactory;

    protected $fillable = [
        'identitas_lks_id',
        'visi_lks',
        'misi_lks',
        'tujuan_lks',
        'status_lks',
        'lingkup_kerja',
        'sifat_pelayanan',
        'posisi_lks',
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}

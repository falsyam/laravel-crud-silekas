<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PengurusLks extends Model
{
    use HasFactory;

    protected $fillable = [
        'identitas_lks_id',
        'nama_ketua',
        'telepon_ketua',
        'alamat_ketua',
        'nama_sekretaris',
        'telepon_sekretaris',
        'alamat_sekretaris',
        'nama_bendahara',
        'telepon_bendahara',
        'alamat_bendahara',
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}
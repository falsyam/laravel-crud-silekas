<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelayananLks extends Model
{
    protected $table = 'pelayanan_lks';

    protected $fillable = [
        'identitas_lks_id',
        'kategori_pelayanan',
        'bentuk_pelayanan',
        'jumlah_binaan',
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}
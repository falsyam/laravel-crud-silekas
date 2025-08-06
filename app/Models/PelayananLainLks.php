<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelayananLainLks extends Model
{
    protected $table = 'pelayanan_lain_lks';

    protected $fillable = [
        'identitas_lks_id',
        'jenis_pelayanan',
        'jumlah_binaan',
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}

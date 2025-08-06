<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JejaringLks extends Model
{
    protected $table = 'jejaring_lks';

    protected $fillable = [
        'identitas_lks_id', 'kategori', 'asal', 'nama_lembaga'
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class,'identitas_lks_id');
    }
}

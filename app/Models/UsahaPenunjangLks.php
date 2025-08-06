<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsahaPenunjangLks extends Model
{
    protected $table = 'usaha_penunjang_lks';

    protected $fillable = [
        'identitas_lks_id',
        'jenis_usaha',
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SumberDanaLainLks extends Model
{
    protected $table = 'sumber_dana_lain_lks';

    protected $fillable = [
        'identitas_lks_id', 'sumber_dana', 'asal_dana'
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}

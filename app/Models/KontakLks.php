<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class KontakLks extends Model
{
    use HasFactory;

    protected $fillable = [
        'identitas_lks_id',
        'telepon',
        'fax',
        'email',
        'website',
        'media_sosial',
    ];

    public function identitas()
    {
        return $this->belongsTo(IdentitasLks::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Prodi extends Model
{
    protected $fillable = [
        'nama_prodi',
        'nama_kaprodi',
        'alias_prodi',
        'fakultas_id',
        'photo_kaprodi'
    ];

    public function fakultas(): BelongsToMany
    {
        return $this->belongsToMany(Fakultas::class);
    }
}
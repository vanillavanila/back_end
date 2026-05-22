<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminContact extends Model
{
    protected $fillable = [
        'jurusan_id',
        'nama',
        'nomor_wa'
    ];

    // RELASI KE JURUSAN
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    // RELASI KE PRODUK
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}


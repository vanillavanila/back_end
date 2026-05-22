<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'jurusan_id',
        'judul_foto',
        'file_foto',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
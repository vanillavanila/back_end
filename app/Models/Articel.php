<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Articel extends Model
{
    protected $fillable = [
        'jurusan_id',
        'title',
        'thumbnail',
        'content',
    ];

    protected $appends = ['excerpt'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function getExcerptAttribute()
    {
        return Str::limit(
            strip_tags($this->content),
            120
        );
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['nama', 'slug', 'deskripsi_profil', 'visi', 'misi'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function teams(){
        return $this->hasMany(Team::class);
    }

    public function produks(){
        return $this->hasMany(Produk::class, 'jurusan_id');
    }

    public function articles(){
        return $this->hasMany(Articel::class, 'jurusan_id');
    }

    public function galleries(){
        return $this->hasMany(Gallery::class, 'jurusan_id');
    }
}

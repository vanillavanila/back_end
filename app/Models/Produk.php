<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['jurusan_id', 'admin_contact_id', 'nama_produk', 'deskripsi', 'foto'];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'jurusan_id');
    }

    public function adminContact(){
        return $this->belongsTo(AdminContact::class);
    }
}

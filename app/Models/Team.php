<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['jurusan_id', 'nama', 'foto', 'jabatan'];
}

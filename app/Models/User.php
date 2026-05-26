<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // ganti kalau tabelmu admin_contacts

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role',
        'jurusan_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return in_array($this->role, ['super_admin', 'admin']);
    }
}
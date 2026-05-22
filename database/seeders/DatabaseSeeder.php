<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'adminsmk@gmail.com'],
            [
                'name' => 'Super Admin',
                'role' => 'super_admin',
                'password' => Hash::make('password'),
            ]
        );
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'adminsmk@gmail.com',
            ],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('123'),
                'role' => 'super_admin',
            ]
        );
    }
}
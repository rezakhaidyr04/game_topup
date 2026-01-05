<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@game-topup.com'], // Kondisi pencarian
            [
                'name' => 'Admin',
                'email' => 'admin@game-topup.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
                'balance' => 0,
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'hp' => '085733465088',
            'alamat' => 'Kediri',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'role_id' => 1,
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin
        User::create([
            'name' => 'Admin Utama',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. User Outlet
        User::create([
            'name' => 'Kasir Outlet Pusat',
            'username' => 'outlet_pusat',
            'email' => 'outlet1@example.com',
            'password' => Hash::make('password'),
            'role' => 'outlet',
            'outlet_id' => 1, // Sesuaikan dengan ID Outlet Pusat
        ]);
        User::create([
            'name' => 'Kasir Outlet Surabaya',
            'username' => 'outlet_surabaya',
            'email' => 'outlet2@example.com',
            'password' => Hash::make('password'),
            'role' => 'outlet',
            'outlet_id' => 2, // Sesuaikan dengan ID Outlet Surabaya
        ]);

        // 3. User Divisi
        User::create([
            'name' => 'Divisi Marketing',
            'username' => 'marketing',
            'email' => 'divisi.marketing@example.com',
            'password' => Hash::make('password'),
            'role' => 'divisi',
            'outlet_id' => 1, // Divisi ini memesan dari Outlet Pusat
            'division_name' => 'Marketing',
        ]);
        User::create([
            'name' => 'Divisi HRD',
            'username' => 'HRD',
            'email' => 'divisi.hrd@example.com',
            'password' => Hash::make('password'),
            'role' => 'divisi',
            'outlet_id' => 2, // Divisi ini memesan dari Outlet Surabaya
            'division_name' => 'Human Resources',
        ]);
    }
}

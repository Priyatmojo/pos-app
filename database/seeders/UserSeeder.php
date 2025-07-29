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
            'name' => 'Outlet Kemel',
            'username' => 'outletA',
            'email' => 'outlet1@example.com',
            'password' => Hash::make('password'),
            'role' => 'outlet',
            'outlet_id' => 1, // Sesuaikan dengan ID Outlet A
        ]);
        User::create([
            'name' => 'Outlet Jormel',
            'username' => 'outletB',
            'email' => 'outlet2@example.com',
            'password' => Hash::make('password'),
            'role' => 'outlet',
            'outlet_id' => 2, // Sesuaikan dengan ID Outlet B
        ]);
        User::create([
            'name' => 'Outlet Bimskuy',
            'username' => 'outletC',
            'email' => 'outlet3@example.com',
            'password' => Hash::make('password'),
            'role' => 'outlet',
            'outlet_id' => 3, // Sesuaikan dengan ID Outlet C
        ]);
        User::create([
            'name' => 'Outlet Kursi',
            'username' => 'outletD',
            'email' => 'outlet4@example.com',
            'password' => Hash::make('password'),
            'role' => 'outlet',
            'outlet_id' => 4, // Sesuaikan dengan ID Outlet D
        ]);
        User::create([
            'name' => 'Outlet Kebun',
            'username' => 'outletE',
            'email' => 'outlet5@example.com',
            'password' => Hash::make('password'),
            'role' => 'outlet',
            'outlet_id' => 5, // Sesuaikan dengan ID Outlet E
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
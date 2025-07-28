<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Outlet;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        Outlet::create([
            'name' => 'Outlet Pusat Jakarta',
            'address' => 'Jl. Jenderal Sudirman No. 1, Jakarta',
        ]);

        Outlet::create([
            'name' => 'Outlet Cabang Surabaya',
            'address' => 'Jl. Basuki Rahmat No. 12, Surabaya',
        ]);
    }
}
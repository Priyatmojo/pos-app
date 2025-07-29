<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Outlet;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        Outlet::create([
            'name' => 'Outlet Kemel',
            'address' => '-',
        ]);

        Outlet::create([
            'name' => 'Outlet Jormel',
            'address' => '-',
        ]);

        Outlet::create([
            'name' => 'Outlet Bimskuy',
            'address' => '-',
        ]);

        Outlet::create([
            'name' => 'Outlet Kursi',
            'address' => '-',
        ]);

        Outlet::create([
            'name' => 'Outlet Kebun',
            'address' => '-',
        ]);
    }
}
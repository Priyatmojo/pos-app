<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Outlet;

class OutletSeeder extends Seeder
{
    public function run(): void
    {
        Outlet::create([
            'name' => 'Outlet A',
            'address' => '-',
        ]);

        Outlet::create([
            'name' => 'Outlet B',
            'address' => '-',
        ]);

        Outlet::create([
            'name' => 'Outlet C',
            'address' => '-',
        ]);

        Outlet::create([
            'name' => 'Outlet D',
            'address' => '-',
        ]);

        Outlet::create([
            'name' => 'Outlet E',
            'address' => '-',
        ]);
    }
}
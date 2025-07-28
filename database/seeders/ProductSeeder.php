<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Produk untuk Outlet 1 (Pusat)
        Product::create(['outlet_id' => 1, 'name' => 'Kopi Susu Gula Aren', 'price' => 18000, 'stock' => 100]);
        Product::create(['outlet_id' => 1, 'name' => 'Americano', 'price' => 15000, 'stock' => 80]);
        Product::create(['outlet_id' => 1, 'name' => 'Croissant Coklat', 'price' => 22000, 'stock' => 50]);

        // Produk untuk Outlet 2 (Surabaya)
        Product::create(['outlet_id' => 2, 'name' => 'Teh Melati', 'price' => 12000, 'stock' => 120]);
        Product::create(['outlet_id' => 2, 'name' => 'Nasi Goreng Spesial', 'price' => 25000, 'stock' => 70]);
        Product::create(['outlet_id' => 2, 'name' => 'Roti Bakar Keju', 'price' => 18000, 'stock' => 60]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Produk untuk Outlet A
        Product::create(['outlet_id' => 1, 'name' => 'Nasi Ayam Goreng', 'price' => 20000, 'stock' => 100,'description' => 'Nasi dengan ayam goreng lezat']);
        Product::create(['outlet_id' => 1, 'name' => 'Nasi Ayam Bakar', 'price' => 20000, 'stock' => 100,'description' => 'Nasi dengan ayam bakar spesial']);
        Product::create(['outlet_id' => 1, 'name' => 'Nasi Ayam Rames', 'price' => 20000, 'stock' => 100]);

        // Produk untuk Outlet B
        Product::create(['outlet_id' => 2, 'name' => 'Nasi Soto', 'price' => 20000, 'stock' => 100]);
        Product::create(['outlet_id' => 2, 'name' => 'Nasi Rawon', 'price' => 20000, 'stock' => 100]);
        Product::create(['outlet_id' => 2, 'name' => 'Nasi Sop Ayam', 'price' => 20000, 'stock' => 100]);

        // Produk untuk Outlet C
        Product::create(['outlet_id' => 3, 'name' => 'Nasi Goreng Jawa', 'price' => 20000, 'stock' => 100]);
        Product::create(['outlet_id' => 3, 'name' => 'Nasi Goreng Bakso', 'price' => 20000, 'stock' => 100]);
        Product::create(['outlet_id' => 3, 'name' => 'Nasi Goreng Sosis', 'price' => 20000, 'stock' => 100]);
        
        // Produk untuk Outlet D
        Product::create(['outlet_id' => 4, 'name' => 'Bakmie Jawa', 'price' => 20000, 'stock' => 100]);
        Product::create(['outlet_id' => 4, 'name' => 'Bakmie Bakso', 'price' => 20000, 'stock' => 100]);
        Product::create(['outlet_id' => 4, 'name' => 'Bakmie Sosis', 'price' => 20000, 'stock' => 100]);

        // Produk untuk Outlet E
        Product::create(['outlet_id' => 5, 'name' => 'Nasi Padang Telur', 'price' => 20000, 'stock' => 100]);
        Product::create(['outlet_id' => 5, 'name' => 'Nasi Padang Ayam Gulai', 'price' => 20000, 'stock' => 100]);
        Product::create(['outlet_id' => 5, 'name' => 'Nasi Padang Ayam bakar', 'price' => 20000, 'stock' => 100]);
    }
}
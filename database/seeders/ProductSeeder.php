<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Produk untuk Outlet A
        Product::create(['outlet_id' => 1, 'name' => 'Nasi Ayam Goreng', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Ayam Goreng + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 1, 'name' => 'Nasi Ayam Bakar', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Ayam Bakar + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 1, 'name' => 'Nasi Ayam Rames', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Ayam Rames + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);

        // Produk untuk Outlet B
        Product::create(['outlet_id' => 2, 'name' => 'Nasi Soto', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Soto Ayam + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 2, 'name' => 'Nasi Rawon', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Rawon Daging + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 2, 'name' => 'Nasi Sop Ayam', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Sop Ayam + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);

        // Produk untuk Outlet C
        Product::create(['outlet_id' => 3, 'name' => 'Nasi Goreng Jawa', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Goreng Jawa + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 3, 'name' => 'Nasi Goreng Bakso', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Goreng Bakso + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 3, 'name' => 'Nasi Goreng Sosis', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Goreng Sosis + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        
        // Produk untuk Outlet D
        Product::create(['outlet_id' => 4, 'name' => 'Bakmie Jawa', 'price' => 20000, 'stock' => 100,'description' => 'Bakmie + Jawa + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 4, 'name' => 'Bakmie Bakso', 'price' => 20000, 'stock' => 100,'description' => 'Bakmie + Bakso + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 4, 'name' => 'Bakmie Sosis', 'price' => 20000, 'stock' => 100,'description' => 'Bakmie + Sosis + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);

        // Produk untuk Outlet E
        Product::create(['outlet_id' => 5, 'name' => 'Nasi Padang Telur', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Padang Telur + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 5, 'name' => 'Nasi Padang Ayam Gulai', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Padang Ayam Gulai + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
        Product::create(['outlet_id' => 5, 'name' => 'Nasi Padang Ayam bakar', 'price' => 20000, 'stock' => 100,'description' => 'Nasi + Padang Ayam Bakar + Lalapan + Es Teh + Sambal + Krupuk + Buah + Surya 1 Batang']);
    }
}
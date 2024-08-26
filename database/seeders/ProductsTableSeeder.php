<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // DB::table('products')->insert([
    //   [
    //     'name' => 'Product 1',
    //     'image' => 'product1.jpg',
    //     'barcode' => '123456789012',
    //     'category' => 'Category 1',
    //     'created_at' => now(),
    //     'updated_at' => now(),
    //   ],
    //   [
    //     'name' => 'Product 2',
    //     'image' => 'product2.jpg',
    //     'barcode' => '123456789013',
    //     'category' => 'Category 2',
    //     'created_at' => now(),
    //     'updated_at' => now(),
    //   ],
    //   // Add more products as needed
    // ]);
  }
}

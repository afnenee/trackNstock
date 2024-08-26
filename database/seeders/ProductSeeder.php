<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run()
  {
    DB::table('product')->insert([
      ['name' => 'Table', 'barcode' => '123456', 'category' => 'Furniture', 'image' => 'table-image.jpg'],
      ['name' => 'PC', 'barcode' => '654321', 'category' => 'Electronics', 'image' => 'pc-image.jpg'],
    ]);
  }

}

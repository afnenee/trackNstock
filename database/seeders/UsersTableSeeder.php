<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
  public function run()
  {
    DB::table('users')->insert([
      'name' => 'afnene',
      'email' => 'afnenthabet@gmail.com',
      'password' => Hash::make('10011974'),
    ]);
  }
}

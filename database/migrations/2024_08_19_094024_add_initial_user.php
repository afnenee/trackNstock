<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up()
  {
    DB::table('users')->insert([
      'name' => 'xx',
      'email' => 'xx@gmail.com',
      'password' => Hash::make('10011974'), // Hash the password
    ]);
  }

  public function down()
  {
    // Optionally, you can add code here to remove the user if necessary
    DB::table('users')->where('xx', 'xx@gmail.com')->delete();
  }
};

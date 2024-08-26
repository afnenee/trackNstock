<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up()
  {
    Schema::create('employer', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('email')->unique();
      $table->string('company');
      $table->string('phone_number');
      $table->string('address');
      $table->string('position');
      $table->timestamps();
    });

  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('employer', function (Blueprint $table) {
      $table->dropColumn(['name', 'email', 'company', 'position', 'hired_at']);
    });
  }
};

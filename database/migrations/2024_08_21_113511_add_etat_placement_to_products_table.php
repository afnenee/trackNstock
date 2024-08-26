<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::table('product_histories', function (Blueprint $table) {
      $table->string('etats');
      $table->string('placement');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('product_histories', function (Blueprint $table) {
      $table->dropColumn(['etats', 'placement']);
    });
  }
};

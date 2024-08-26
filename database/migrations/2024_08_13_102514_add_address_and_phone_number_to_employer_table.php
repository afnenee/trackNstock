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
    Schema::table('employer', function (Blueprint $table) {
      $table->string('address')->after('hired_at')->nullable(); // Add nullable() if the column is not required
      $table->string('phone_number')->after('address')->nullable(); // Add nullable() if the column is not required

    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('employer', function (Blueprint $table) {
      $table->dropColumn('address');

      $table->dropColumn('phone_number');
    });
  }
};

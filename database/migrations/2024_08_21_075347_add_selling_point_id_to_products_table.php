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
    Schema::table('products', function (Blueprint $table) {
      $table->unsignedBigInteger('selling_point_id')->nullable()->before('placement'); // Add column before 'placement'
      $table->foreign('selling_point_id')->references('id')->on('selling_point')->onDelete('cascade');
    });
  }

  public function down(): void
  {
    Schema::table('products', function (Blueprint $table) {
      $table->dropForeign(['selling_point_id']); // Drop the foreign key constraint
      $table->dropColumn('selling_point_id'); // Remove the foreign key column
    });
  }
};

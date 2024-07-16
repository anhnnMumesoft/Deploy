<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('productimages', function (Blueprint $table) {
            $table->id();
            $table->string('caption')->nullable();
            $table->unsignedBigInteger('product_detail_id');
            $table->timestamps();
            $table->softDeletes();
        });
          // Use raw SQL to add the longblob column
          DB::statement('ALTER TABLE productimages ADD image LONGBLOB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('productimages');
    }
};

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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('name');
            $table->string('statusId');
            $table->timestamps(); // Tự động tạo các cột createdAt và updatedAt
            $table->softDeletes();
        });
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('image');
            DB::statement('ALTER TABLE banners ADD image LONGBLOB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};

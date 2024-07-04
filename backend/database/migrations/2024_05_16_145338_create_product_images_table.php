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
            $table->binary('image'); // Tạo cột image với kiểu binary ban đầu
            $table->timestamps();
        });

        // Sử dụng câu lệnh thô để thay đổi kiểu dữ liệu của cột image thành LONGBLOB
        Schema::table('productimages', function (Blueprint $table) {
            DB::statement('ALTER TABLE productimages MODIFY image LONGBLOB');
        });
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
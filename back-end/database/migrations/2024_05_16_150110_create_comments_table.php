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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            $table->binary('image', ['length' => 4294967295])->nullable();
            $table->unsignedBigInteger('parentId')->nullable();
            $table->unsignedBigInteger('productId')->nullable();
            $table->unsignedBigInteger('userId')->nullable();
            $table->unsignedBigInteger('blogId')->nullable();
            $table->integer('star');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('image');
            DB::statement('ALTER TABLE comments ADD image LONGBLOB');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

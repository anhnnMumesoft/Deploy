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
        Schema::create('orderproducts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_user_id')->nullable();
            $table->foreignId('shipper_id')->nullable();
            $table->string('status_id');
            $table->foreignId('type_ship_id')->nullable();
            $table->foreignId('voucher_id')->nullable();
            $table->string('note')->nullable();
            $table->integer('is_payment_online')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
          // Use raw SQL to add the longblob column
          DB::statement('ALTER TABLE orderproducts ADD image LONGBLOB');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('orderproducts');
    }
};

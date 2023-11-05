<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sale_returns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->foreignId('biller_id')->nullable();
            $table->foreignId('supplier_id')->nullable();
            $table->foreignId('sale_id')->nullable();
            $table->string('sale_code')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_returns');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_receipt_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->bigInteger('website_id')->unsigned()->nullable();
            $table->bigInteger('hostname_id')->unsigned()->nullable();
            $table->foreignId('stock_receipt_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->text('name')->nullable();
            $table->foreignId('variation_id')->nullable();
            $table->decimal('quantity', 20)->default('0');
            $table->tinyInteger('is_blank')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_receipt_items');
    }
};

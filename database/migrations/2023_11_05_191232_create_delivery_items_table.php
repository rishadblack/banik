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
        Schema::create('delivery_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->foreignId('order_id')->nullable();
            $table->foreignId('order_item_id')->nullable();
            $table->foreignId('delivery_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->text('name')->nullable();
            $table->foreignId('variation_id')->nullable();
            $table->foreignId('product_batch_id')->nullable();
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
        Schema::dropIfExists('delivery_items');
    }
};

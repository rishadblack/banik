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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->bigInteger('website_id')->unsigned()->nullable();
            $table->bigInteger('hostname_id')->unsigned()->nullable();
            $table->foreignId('order_id')->nullable();
            $table->foreignId('contact_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->text('name')->nullable();
            $table->foreignId('variation_id')->nullable();
            $table->foreignId('product_batch_id')->nullable();
            $table->decimal('amount', 20, 6)->default('0.00');
            $table->decimal('quantity', 20)->default('0');
            $table->decimal('received_quantity', 20)->default('0');
            $table->decimal('delivery_quantity', 20)->default('0');
            $table->string('vat')->nullable();
            $table->decimal('vat_amount', 20, 6)->default('0.00');
            $table->string('discount')->nullable();
            $table->decimal('discount_amount', 20, 6)->default('0.00');
            $table->decimal('subtotal', 20, 6)->default('0.00');
            $table->tinyInteger('is_return')->nullable();
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
        Schema::dropIfExists('order_items');
    }
};

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('unit_id')->nullable();
            $table->foreignId('brand_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->string('code', 100);
            $table->tinyInteger('type')->nullable();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->string('product_image')->nullable();
            $table->double('opening_stock', 20, 2)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('is_single')->nullable();
            $table->string('low_stock_alert', 100)->nullable();
            $table->tinyInteger('is_out_of_stock_sell')->nullable();
            $table->tinyInteger('is_change_variation')->nullable();
            $table->foreignUuid('variation_one')->nullable();
            $table->string('variation_item_one', 100)->nullable();
            $table->foreignUuid('variation_two')->nullable();
            $table->string('variation_item_two', 100)->nullable();
            $table->foreignUuid('variation_three')->nullable();
            $table->string('variation_item_three', 100)->nullable();
            $table->integer('sort')->nullable();
            $table->decimal('ltr', 20, 2)->default('0.00');
            $table->decimal('ctn', 20)->default('0');
            $table->decimal('purchase_price', 20, 6)->default('0.00');
            $table->string('purchase_vat', 20)->nullable();
            $table->decimal('purchase_vat_amount', 20, 6)->default('0.00');
            $table->decimal('net_purchase_price', 20, 6)->default('0.00');
            $table->decimal('sale_price', 20, 6)->default('0.00');
            $table->string('profit_margin', 20)->default('0.00');
            $table->string('vat', 20)->nullable();
            $table->decimal('vat_amount', 20, 6)->default('0.00');
            $table->string('discount', 20)->nullable();
            $table->decimal('discount_amount', 20, 6)->default('0.00');
            $table->timestamp('discount_start')->nullable();
            $table->timestamp('discount_end')->nullable();
            $table->decimal('discount_min_qty', 20, 2)->nullable();
            $table->decimal('net_sale_price', 20, 6)->default('0.00');
            $table->bigInteger('demo_id')->nullable();
            $table->tinyInteger('is_serialize')->nullable();
            $table->tinyInteger('is_batch')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

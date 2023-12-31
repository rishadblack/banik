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
        Schema::create('stock_receipts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->foreignId('contact_id')->nullable();
            $table->foreignId('warehouse_id')->nullable();
            $table->foreignId('outlet_id')->nullable();
            $table->foreignId('to_warehouse_id')->nullable();
            $table->foreignId('to_outlet_id')->nullable();
            $table->foreignId('stock_receipt_type_id')->nullable();
            $table->tinyInteger('type')->nullable()->comment('1=Stock Adjustment, 2=Stock Transfer');
            $table->tinyInteger('flow')->nullable();
            $table->string('code', 100)->nullable();
            $table->string('ref', 100)->nullable();
            $table->text('particulars')->nullable();
            $table->double('quantity', 20, 2)->default(0);
            $table->double('damage_quantity', 20, 2)->default(0);
            $table->foreignId('approved_id')->nullable();
            $table->timestamp('is_approved')->nullable();
            $table->foreignId('checked_id')->nullable();
            $table->timestamp('is_checked')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamp('stock_receipt_date')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_receipts');
    }
};

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
        Schema::create('ledger_accounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->foreignId('biller_id')->nullable();
            $table->foreignId('supplier_id')->nullable();
            $table->foreignId('sale_code')->nullable();
            $table->foreignId('purchase_code')->nullable();
            $table->string('legder_code')->nullable();
            $table->string('particular')->nullable();
            $table->string('reference')->nullable();
            $table->string('outlet')->nullable();
            $table->string('date')->nullable();
            $table->string('customer_supplier')->nullable();
            $table->string('stock_adjustment_status')->nullable();
            $table->string('note')->nullable();
            $table->string('item_name')->nullable();
            $table->string('cost_price')->nullable('0.00');
            $table->string('quantity')->nullable();
            $table->string('adjustment_amount')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledger_accounts');
    }
};

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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->foreignId('payment_method_id')->nullable();
            $table->foreignId('order_id')->nullable();
            $table->foreignId('receipt_id')->nullable();
            $table->foreignId('contact_id')->nullable();
            $table->foreignId('warehouse_id')->nullable();
            $table->foreignId('outlet_id')->nullable();
            $table->string('ref')->nullable();
            $table->timestamp('txn_date')->nullable();
            $table->string('code', 100)->nullable();
            $table->tinyInteger('flow')->nullable();
            $table->double('amount', 20, 6)->default('0.00');
            $table->string('charge', 100)->nullable();
            $table->double('charge_amount', 20, 6)->default('0.00');
            $table->double('pay_change_amount', 20, 6)->default('0.00');
            $table->double('net_amount', 20, 6)->default('0.00');
            $table->text('note')->nullable();
            $table->tinyInteger('is_opening')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};

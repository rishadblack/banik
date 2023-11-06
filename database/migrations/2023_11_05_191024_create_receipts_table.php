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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->foreignId('contact_id')->nullable();
            $table->foreignId('invoice_id')->nullable();
            $table->foreignId('warehouse_id')->nullable();
            $table->foreignId('outlet_id')->nullable();
            $table->foreignId('receipt_type_id')->nullable();
            $table->foreignId('ledger_account_id')->nullable();
            $table->foreignId('payment_method_id')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('flow_type')->nullable();
            $table->string('code', 100)->nullable();
            $table->string('ref')->nullable();
            $table->text('particulars')->nullable();
            $table->double('amount', 20, 6)->default(0);
            $table->foreignId('approved_id')->nullable();
            $table->timestamp('is_approved')->nullable();
            $table->foreignId('checked_id')->nullable();
            $table->timestamp('is_checked')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamp('date')->nullable();
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
        Schema::dropIfExists('receipts');
    }
};

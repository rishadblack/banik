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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->nullable()->comment('1=Sale, 2=Sale Return, 3=Purchase, 4=Purchase Return, 5=Quotation');
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->bigInteger('website_id')->unsigned()->nullable();
            $table->bigInteger('hostname_id')->unsigned()->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('contact_id')->nullable();
            $table->foreignId('cancel_by')->nullable();
            $table->foreignId('paid_by')->nullable();
            $table->foreignId('order_by')->nullable();
            $table->foreignId('payment_method_id')->nullable();
            $table->foreignId('shipping_method_id')->nullable();
            $table->foreignId('coupon_id')->nullable();
            $table->foreignId('warehouse_id')->nullable();
            $table->foreignId('outlet_id')->nullable();
            $table->string('ref')->nullable();
            $table->timestamp('order_date')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->timestamp('delivery_date')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->string('code', 100)->nullable();
            $table->string('sales_person',20,6)->nullable();
            $table->string('delivery_charge')->default('0.00');
            $table->string('product_code', 100)->nullable();
            $table->decimal('subtotal', 20, 6)->default('0.00');
            $table->string('vat')->nullable();
            $table->decimal('vat_amount', 20, 6)->default('0.00');
            $table->string('discount')->nullable();
            $table->decimal('discount_amount', 20, 6)->default('0.00');
            $table->decimal('shipping_charge', 20, 6)->default('0.00');
            $table->decimal('additional_charge', 20, 6)->default('0.00');
            $table->decimal('net_amount', 20, 6)->default('0.00');
            $table->decimal('paid_amount', 20, 6)->default('0.00');
            $table->decimal('due_amount', 20, 6)->default('0.00');
            $table->decimal('pay_change_amount', 20, 6)->default('0.00');
            $table->string('currency_code')->nullable();
            $table->double('currency_rate', 15, 8)->default('0.00');
            $table->tinyInteger('invoice_type')->nullable();
            $table->string('attach_file')->nullable();
            $table->text('stuff_note')->nullable();
            $table->text('note')->nullable();
            $table->tinyInteger('payment_status')->nullable();
            $table->tinyInteger('delivery_status')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->foreignId('approved_by')->nullable();
            $table->timestamp('is_approved')->nullable();
            $table->foreignId('checked_by')->nullable();
            $table->timestamp('is_checked')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

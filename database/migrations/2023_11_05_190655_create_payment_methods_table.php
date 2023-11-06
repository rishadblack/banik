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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->text('name')->nullable();
            $table->string('code', 100)->nullable();
            $table->string('logo_url')->nullable();
            $table->decimal('minimum_payment', 20, 6)->nullable();
            $table->decimal('maximum_payment', 20, 6)->nullable();
            $table->foreignId('ledger_account_id')->nullable();
            $table->string('branch')->nullable();
            $table->string('account_no')->nullable();
            $table->string('charge', 20)->nullable();
            $table->foreignId('charge_ledger_account_id')->nullable();
            $table->bigInteger('demo_id')->nullable();
            $table->tinyInteger('is_default')->nullable();
            $table->decimal('opening_balance', 20, 6)->nullable();
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
        Schema::dropIfExists('payment_methods');
    }
};

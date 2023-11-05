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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->tinyInteger('type')->nullable()->comment('1=Customer, 2=Supplier, 3=Biller, 4=Stuff');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->unsigned()->nullable();;
            $table->foreignId('hostname_id')->unsigned()->nullable();;
            $table->foreignId('outlet_id')->nullable();
            $table->foreignId('contact_group_id')->nullable();
            $table->string('code')->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('mobile', 30)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->text('address')->nullable();
            $table->text('address1')->nullable();
            $table->foreignId('country_id')->unsigned()->nullable();
            $table->foreignId('state_id')->unsigned()->nullable();
            $table->foreignId('district_id')->unsigned()->nullable();
            $table->foreignId('thana_id')->unsigned()->nullable();
            $table->string('image_url')->nullable();
            $table->string('default_currency')->nullable();
            $table->string('currency_code')->nullable();
            $table->double('currency_rate', 15, 8)->nullable();
            $table->decimal('credit_limit', 20, 6)->nullable();
            $table->decimal('opening_balance', 20, 6)->nullable();
            $table->bigInteger('demo_id')->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('contacts');
    }
};

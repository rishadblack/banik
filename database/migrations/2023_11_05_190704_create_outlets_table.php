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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->unsigned();
            $table->foreignId('hostname_id')->unsigned();
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('mobile', 30)->nullable();
            $table->string('postcode', 10)->nullable();
            $table->text('address')->nullable();
            $table->text('address1')->nullable();
            $table->foreignId('country_id')->unsigned()->nullable();
            $table->foreignId('division_id')->unsigned()->nullable();
            $table->foreignId('district_id')->unsigned()->nullable();
            $table->foreignId('upazila_id')->unsigned()->nullable();
            $table->foreignId('demo_id')->nullable();
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
        Schema::dropIfExists('outlets');
    }
};

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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('variation_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->string('image_url')->nullable();
            $table->integer('sort')->nullable();
            $table->tinyInteger('is_default')->nullable();
            $table->bigInteger('demo_id')->nullable();
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
        Schema::dropIfExists('product_images');
    }
};

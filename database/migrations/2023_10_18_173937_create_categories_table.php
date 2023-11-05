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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->text('slug')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->foreignId('website_id')->nullable();
            $table->foreignId('hostname_id')->nullable();
            $table->text('name')->nullable();
            $table->text('description')->nullable();
            $table->string('code')->nullable();
            $table->string('type')->nullable();
            $table->string('sort', 100)->nullable();
            $table->string('image_url', 100)->nullable();
            $table->string('icon', 100)->nullable();
            $table->tinyInteger('is_featured')->nullable();
            $table->tinyInteger('set_icon')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->bigInteger('demo_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

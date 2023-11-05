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
        Schema::create('contact_groups', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignUuid('user_id')->nullable();
            $table->bigInteger('website_id')->unsigned()->nullable();
            $table->bigInteger('hostname_id')->unsigned()->nullable();
            $table->string('name', 100)->nullable();
            $table->integer('sort')->nullable();
            $table->bigInteger('demo_id')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_groups');
    }
};

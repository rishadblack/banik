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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->bigInteger('website_id')->unsigned()->nullable();
            $table->bigInteger('hostname_id')->unsigned()->nullable();
            $table->foreignId('contact_id');
            $table->string('name', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('mobile', 30)->nullable();
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
        Schema::dropIfExists('contact_infos');
    }
};

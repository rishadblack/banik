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
        Schema::create('receipt_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('serial')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('website_id')->unsigned()->nullable();
            $table->foreignId('hostname_id')->unsigned()->nullable();
            $table->tinyInteger('form_type')->nullable();
            $table->tinyInteger('flow_type')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->text('chart_of_section_id')->nullable();
            $table->text('name')->nullable();
            $table->string('receipt_prefix', 10)->nullable();
            $table->string('receipt_suffix', 10)->nullable();
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
        Schema::dropIfExists('receipt_types');
    }
};

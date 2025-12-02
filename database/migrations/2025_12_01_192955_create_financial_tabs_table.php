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
        Schema::create('financial_tabs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('financial_id')->constrained('financials')->onDelete('cascade');
            $table->string('tab_icon')->nullable();
            $table->string('tab_title')->nullable();
            $table->text('tab_description')->nullable();
            $table->integer('order_number')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_tabs');
    }
};

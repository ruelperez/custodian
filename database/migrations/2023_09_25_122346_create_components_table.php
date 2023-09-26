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
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('unit');
            $table->string('receiver');
            $table->string('property_number')->nullable();
            $table->bigInteger('quantity');
            $table->string('date_acquired');
            $table->bigInteger('amount')->nullable();
            $table->unsignedBigInteger('property_card_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};

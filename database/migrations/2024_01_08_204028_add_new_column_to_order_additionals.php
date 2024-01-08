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
        Schema::table('order_additionals', function (Blueprint $table) {
            $table->string('chief')->nullable();
            $table->string('place_delivery')->nullable();
            $table->string('date_delivery')->nullable();
            $table->string('delivery_term')->nullable();
            $table->string('payment_term')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_additionals', function (Blueprint $table) {
            //
        });
    }
};

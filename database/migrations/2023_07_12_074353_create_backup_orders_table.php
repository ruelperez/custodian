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
        Schema::create('backup_orders', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->bigInteger('quantity')->nullable();
            $table->bigInteger('unit')->nullable();
            $table->bigInteger('unit_cost')->nullable();
            $table->bigInteger('total_cost')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_orders');
    }
};

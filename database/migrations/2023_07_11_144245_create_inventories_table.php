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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->bigInteger('quantity')->nullable();
            $table->string('unit')->nullable();
            $table->bigInteger('unit_cost')->nullable();
            $table->bigInteger('total_cost')->nullable();
            $table->bigInteger('inventory_number')->nullable();
            $table->string('estimated')->nullable();
            $table->string('item_type');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};

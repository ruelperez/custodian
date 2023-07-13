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
        Schema::create('prepares', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->bigInteger('quantity')->default(0);
            $table->bigInteger('unit')->default(0);
            $table->string('item_type');
            $table->string('receiver');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prepares');
    }
};

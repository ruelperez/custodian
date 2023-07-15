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
        Schema::create('backup_wastes', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->bigInteger('quantity');
            $table->bigInteger('unit');
            $table->string('receiver');
            $table->string('serial')->nullable();
            $table->string('condition');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_wastes');
    }
};

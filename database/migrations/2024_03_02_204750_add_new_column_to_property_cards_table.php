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
        Schema::table('property_cards', function (Blueprint $table) {
            $table->string('position')->nullable();
            $table->string('ppe')->nullable();
            $table->string('reference')->nullable();
            $table->string('officer')->nullable();
            $table->string('dates')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('property_cards', function (Blueprint $table) {
            //
        });
    }
};

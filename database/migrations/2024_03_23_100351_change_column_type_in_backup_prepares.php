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
        Schema::table('backup_prepares', function (Blueprint $table) {
            $table->boolean('is_stolen')->default(0);
            $table->boolean('is_lost')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('backup_prepares', function (Blueprint $table) {
            //
        });
    }
};

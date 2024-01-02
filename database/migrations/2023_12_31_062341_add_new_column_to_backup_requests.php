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
        Schema::table('backup_requests', function (Blueprint $table) {
            $table->string('purpose')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('designator')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('backup_requests', function (Blueprint $table) {
            //
        });
    }
};

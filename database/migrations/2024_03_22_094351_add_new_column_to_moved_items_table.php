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
        Schema::table('moved_items', function (Blueprint $table) {
            $table->string('transaction_name')->nullable();
            $table->string('ics')->nullable();
            $table->string('prop_num')->nullable();
            $table->string('par_num')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('moved_items', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('pars', function (Blueprint $table) {
            $table->string('unit_cost')->nullable()->change();
            $table->string('item_type')->nullable()->change();
            $table->string('ics')->nullable()->change();
            $table->string('total_cost')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pars', function (Blueprint $table) {
            //
        });
    }
};

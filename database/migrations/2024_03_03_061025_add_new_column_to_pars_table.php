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
            $table->string('property_num')->nullable();
            $table->string('date_acquired')->nullable();
            $table->string('amount')->nullable();
            $table->string('position')->nullable();
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

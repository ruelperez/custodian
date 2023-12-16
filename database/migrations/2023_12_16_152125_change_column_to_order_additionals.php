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
        Schema::table('order_additionals', function (Blueprint $table) {
            $table->string('supplier')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('tin')->nullable()->change();
            $table->string('po_num')->nullable()->change();
            $table->string('mode')->nullable()->change();
            $table->string('total_words')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_additionals', function (Blueprint $table) {
            //
        });
    }
};

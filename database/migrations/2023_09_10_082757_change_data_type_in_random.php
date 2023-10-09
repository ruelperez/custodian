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
        Schema::table('backup_orders', function (Blueprint $table) {
            $table->string('unit')->change();
        });
        Schema::table('backup_prepares', function (Blueprint $table) {
            $table->string('unit')->change();
        });
        Schema::table('backup_requests', function (Blueprint $table) {
            $table->string('unit')->change();
        });
        Schema::table('backup_wastes', function (Blueprint $table) {
            $table->string('unit')->change();
        });
        Schema::table('inventories', function (Blueprint $table) {
            $table->string('unit')->change();
        });
        Schema::table('moved_items', function (Blueprint $table) {
            $table->string('unit')->change();
        });
        Schema::table('prepares', function (Blueprint $table) {
            $table->string('unit')->change();
        });
        Schema::table('property_cards', function (Blueprint $table) {
            $table->string('unit')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('random', function (Blueprint $table) {
            //
        });
    }
};

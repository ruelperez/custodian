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
        Schema::create('pars', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->bigInteger('quantity')->default(0);
            $table->string('unit');
            $table->string('item_type');
            $table->string('receiver');
            $table->string('serial')->nullable();
            $table->string('ics');
            $table->bigInteger('unit_cost')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pars');
    }
};

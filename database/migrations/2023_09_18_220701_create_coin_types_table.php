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
        Schema::create('coin_types', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->float('min_price')->default(0);
            $table->float('growth_rate')->default(30.0);
            $table->float('max_price')->default(0);
            $table->float('total_supply')->default(0);
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_types');
    }
};

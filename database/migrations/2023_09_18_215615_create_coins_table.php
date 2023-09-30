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
        Schema::create('coins', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('coin_name');
            $table->foreignUuid('user_id');
            $table->foreignUuid('coin_type_id');
            $table->float('coin_value')->default(0);
            $table->float('coin_total_supply')->default(0);
            $table->json('coin_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coins');
    }
};

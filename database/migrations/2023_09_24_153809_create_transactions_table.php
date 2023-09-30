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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('client_id')->constrained();
            $table->uuid('coin_id')->constrained();
            $table->uuid('sell_date_id')->constrained();
            $table->float('amount'); // amount of coin purchased
            $table->string('status')->default('pending'); // pending, completed, failed
            $table->string('payment_method')->default('bank_transfer'); // bank_transfer, card_payment, ewallet
            $table->string('payment_reference')->nullable();
            $table->string('payment_proof')->nullable();
            $table->string('payment_proof_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

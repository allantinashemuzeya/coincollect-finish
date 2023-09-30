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
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('user_id')->constrained();
            $table->string('phone_number');
            $table->string('address');
            $table->string('country')->default("South Africa");
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('account_name');
            $table->string('account_type'); // savings, current, domiciliary
            $table->string('Swift_code')->nullable();
            $table->string('desired_reference')->default("Coin purchase from Coin Collect User");
            $table->json('desired_payment_methods')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

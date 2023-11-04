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
        //
        Schema::create('referrals', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('referrer_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('use_count')->default(0);
            $table->string('referral_code');

            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('referrals');
    }
};

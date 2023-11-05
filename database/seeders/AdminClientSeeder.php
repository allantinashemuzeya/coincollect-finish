<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::where('email','admin@admin.com')->first();
        Client::create([
            'user_id' => $user->id,
            'phone_number' => 'DEFAULT',
            'address' => 'NONE',
            'country' => 'South Africa',
            'bank_name' => 'DEFAULT',
            'account_number' => 'DEFAULT',
            'account_name' => 'DEFAULT',
            'account_type' => 'DEFAULT',
            'desired_payment_methods' => ['eft'],
        ]);

    }
}

<?php

namespace App\Console\Commands;

use App\Models\Referral;
use App\Models\User;
use Illuminate\Console\Command;

class generateReferralCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generateReferralCodes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate referral codes for users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            $referralCode = $user->name[0].$user->name[1] . rand(10000, 99999);
            Referral::create([
                'user_id' => $user->id,
                'referrer_id' => $user->id,
                'referral_code' => $referralCode,
            ]);
        }
    }
}

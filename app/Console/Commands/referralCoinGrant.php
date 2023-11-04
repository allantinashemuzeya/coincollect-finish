<?php

namespace App\Console\Commands;

use App\Models\Coin;
use App\Models\Referral;
use Illuminate\Console\Command;

class referralCoinGrant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coin:referral-coin-grant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Grant referral coins to users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // find coins in the coins table that belongs to the admin role and grant them to the user that has a referral use count of 5

        $qualified_users = [];
        $referrals  = Referral::where('use_count', 5)->get();

        foreach ($referrals as $referral) {
            $qualified_users[] = $referral->user_id;
        }

        $available_coins = [];
        $coins = Coin::all();

        foreach ($coins as $coin) {
            $isAdmin = $coin->user->inRole('platform-admins');
            if($isAdmin && $coin->coinType->name == 'Bronze') {
                $available_coins[] = $coin;
            }
        }

       // go through the qualified users and grant each of them a coin
        foreach ($qualified_users as $user_id) {
            $coin = $available_coins[array_rand($available_coins)];
            $coin->user_id = $user_id;
            $coin->save();
        }

    }
}

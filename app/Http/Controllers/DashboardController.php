<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    //
    public function dashboardView (): Response
    {
        $client_id = auth()->user()->client->id;
        $user_coins = auth()->user()->coins;

        $total_coin_value = 0;
        foreach ($user_coins as $coin){
            $total_coin_value += $coin->coin_value;
        }

        $pending_transactions = Transaction::where('client_id',$client_id)->where('status','pending')->get();
        $pending_transaction_coins = [];

        foreach ($pending_transactions as $transaction){
            $pending_transaction_coins[] = $transaction->coin_id;
        }

        $pending_balance = 0;
        foreach ($pending_transaction_coins as $transaction){
            $transaction = Transaction::where('coin_id',$transaction)->first();
            $pending_balance += $transaction->amount;
        }

        $referral_link = config('app.url').'/register?referral_code='.
            auth()->user()->referral->referral_code;

        return Inertia::render('Dashboard', [
            'user_coins' => $user_coins,
            'pending_transaction_coins' => $pending_transaction_coins,
            'total_balance' => $total_coin_value,
            'pending_balance' => $pending_balance,
            'referral_link' => $referral_link,
        ]);
    }
}

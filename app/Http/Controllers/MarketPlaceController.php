<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\SellDate;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class MarketPlaceController extends Controller
{
    //

    public function marketPlaceView(): Response
    {
        $coins = Coin::all();
        $market_coins = [];

        foreach ($coins as $coin){
            $client = $coin->user->client;
            $coin->client = $client;
            $market_coins[] = $coin;
        }

        //lets only have coins that are not in the transaction table with a pending status
        $transactions = Transaction::where('status','pending')->get();
        $transaction_coins = [];
        foreach ($transactions as $transaction){
            $transaction_coins[] = $transaction->coin_id;
        }
        $market_coins = array_filter($market_coins, function ($coin) use ($transaction_coins) {
            return !in_array($coin->id, $transaction_coins);
        });

        return Inertia::render('MarketPlace', [
            'market_coins' => $market_coins
        ]);
    }

    public function confirmPurchase(Request $request)
    {
        //create new transaction
        $this->createTransaction($request);
        //notify coin owner
        //remove coin from market place
        //show coin in purchaser pending purchases
        //show coin in seller pending purchases

    }

    private function createTransaction(Request $request)
    {
        $purchaser_uid = auth()->user()->id;

        $sell_dates = SellDate::all();
        $today = Carbon::now();

        foreach ($sell_dates as $sell_date){
            if($sell_date->sell_date->isSameDay($today)){
                $path = 'storage/pops/'.$purchaser_uid.'/'.$request->coin_id;
                $path = $request->file('pop')->store($path);
                $coin = Coin::where('id',$request->coin_id)->get()->first();
                Transaction::create([
                    'client_id' => $request->user()->client->id,
                    'coin_id' => $request->coin_id,
                    'amount' => $coin->coin_value,
                    'status' => 'pending',
                    'payment_method' => $request->payment_method,
                    'payment_proof' => $path,
                    'payment_proof_type' => 'document',
                    'sell_date_id' => $sell_date->id,
                ]);
            }
        }

    }
}

<?php

namespace App\Console\Commands;

use App\Models\Coin;
use App\Models\SellDate;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateCoinValues extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coin:update-coin-values';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update coin values every 5 days';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $coins = Coin::all();
        foreach ($coins as $coin) {
            $today = Carbon::today();
            $sellDates = SellDate::all();
            foreach ($sellDates as $sellDate) {
                if ($today->isSameDay($sellDate->sell_date)) {
                    $coin->update([
                        'value' => $coin->value + ($coin->value * rand(10, 30) / 100),
                    ]);
                }
            }
        }
    }
}

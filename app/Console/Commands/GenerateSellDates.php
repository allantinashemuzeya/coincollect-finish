<?php

namespace App\Console\Commands;

use App\Models\SellDate;
use Illuminate\Console\Command;
use Carbon\Carbon;

class GenerateSellDates extends Command
{
    protected $signature = 'coin:generate-sell-dates';

    protected $description = 'Generate sell dates for users every 5 days';

    public function handle(): void
    {
        // Logic to generate sell dates starting with today
        $sellDate = Carbon::now();
        SellDate::create([
            'sell_date' => $sellDate,
        ]);

        $sellDate = Carbon::now()->addDays(5); // Initial sell date
        // store the generated sell date in the database
        SellDate::create([
            'sell_date' => $sellDate,
        ]);

        $this->info($sellDate); // Output the generated sell date
        $this->info('Sell date generated successfully.');
    }
}

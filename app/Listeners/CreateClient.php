<?php

namespace App\Listeners;

use App\Events\Registered;
use App\Models\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateClient
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        Client::create([
            'user_id' => $event->user->id,
            'name' => $event->user->name,
            'phone_number' => $event->user->phone_number,
            'country' => $event->user->address,
            'bank_name' => $event->user->bank_name,
            'account_number' => $event->user->account_number,
            'account_name' => $event->user->account_name,
            'account_type' => $event->user->account_type,
            'Swift_code' => $event->user->Swift_code,
            'desired_reference' => $event->user->desired_reference,
            'desired_payment_methods' => $event->user->desired_payment_methods,
        ]);
    }
}

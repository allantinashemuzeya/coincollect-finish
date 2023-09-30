<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    //
    public function create(){
        Inertia::render('Client/CreateClient');
    }

    public function store(Request $request)
    {
        Client::create([
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'country' => $request->country,
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'account_type' => $request->account_type,
            'Swift_code' => $request->Swift_code,
            'desired_reference' => $request->desired_reference,
            'desired_payment_methods' => $request->desired_payment_methods,
        ]);
        return redirect()->route('dashboard');
    }
}

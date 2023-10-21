<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    //
    public function dashboardView (): Response
    {
        $user_coins = auth()->user()->coins;
        return Inertia::render('Dashboard', [
            'user_coins' => $user_coins
        ]);
    }
}

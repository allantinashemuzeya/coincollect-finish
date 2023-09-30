<?php

namespace App\Http\Controllers;

use App\Models\SellDate;
use http\Client\Response;
use Illuminate\Http\Request;

class SellDateController extends Controller
{
    //

    public function getSellDates(): \Illuminate\Http\JsonResponse
    {
        $sellDates = SellDate::all();
        return response()->json($sellDates);
    }
}

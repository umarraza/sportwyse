<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ImportStripeDataController extends Controller
{
    public function index()
    {
        $transactions = collect([]);

        return Inertia::render('Club/Stripe/Index',[
            'transactions' => $transactions
        ]);
    }
}

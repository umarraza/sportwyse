<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Imports\TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;

class StripeController extends Controller
{
    public function index() 
    {
        $transactions = Transaction::all();

        return Inertia::render('Stripe/Index', [
            'transactions' => $transactions,
        ]);    
    }    
    
    public function create() 
    {
        return Inertia::render('Stripe/Create');    
    }

    public function store(Request $request) 
    {
        Excel::import(new TransactionsImport, $request->file('file'));

        return redirect()->route('stripe.index')->with('success', 'Transactions imported successfully');

    }
}

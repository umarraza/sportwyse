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

    public function filter(Request $request) 
    {
        $q = Transaction::query();

        if ($request->email) {
            $q->where('customer_email', $request->email);
        }

        if ($request->customer_description) {
            $q->where('customer_description', $request->customer_description);
        }

        if ($request->status) {
            $q->where('status', $request->status);
        }

        if ($request->customer_id) {
            $q->where('customer_id', $request->customer_id);
        }

        if ($request->event_name) {
            $q->where('event_name', $request->event_name);
        }

        if ($request->created_date) {
            $q->whereDate('created_date', $request->date('created_date'));
        }

        return response()->json([
            'status'        => 'success',
            'transactions'  => $q->get(),
        ], 200);
    }
}

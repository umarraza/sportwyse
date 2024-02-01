<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update([
            'player_id' => $request->player_id,
            'camp_id' => $request->camp_id,
        ]);

        return redirect()->route('stripe.index')->with('success', 'Transaction updated successfully');
    }
}

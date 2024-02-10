<?php

namespace App\Http\Controllers;

use App\Models\TempTransaction;
use Illuminate\Http\Request;

class TempTransactionController extends Controller
{
    public function update(Request $request, TempTransaction $transaction)
    {
        $transaction->update([
            'player_id' => $request->player_id,
            'camp_id' => $request->camp_id,
        ]);

        return redirect()->route('stripe.index')->with('success', 'TempTransaction updated successfully');
    }
}

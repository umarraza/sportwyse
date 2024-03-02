<?php

namespace App\Http\Controllers\Club;

use App\Models\Player;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerTransactionRequest;

class PlayerTransactionController extends Controller
{
    /**
     * Store a new player transaction.
     *
     * @param  StorePlayerTransactionRequest  $request
     * @param  Player  $player
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePlayerTransactionRequest $request, Player $player) 
    {
        $player->transactions()->create([
            'created_date' => $request->date('date'),
            'amount' => $request->amount,
            'camp_id' => $request->camp_id,
            'payment_type' => $request->payment_type,
            'status' => 'Paid'
        ]);

        return redirect()->route('club.players.details', $player->id)->with('success', 'Transaction added successfully');
    }

    /**
     * Update a player transaction.
     *
     * @param  StorePlayerTransactionRequest  $request
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StorePlayerTransactionRequest $request, Transaction $transaction) 
    {
        $transaction->update([
            'created_date' => $request->date('date'),
            'amount' => $request->amount,
            'camp_id' => $request->camp_id,
            'payment_type' => $request->payment_type,
            'status' => 'Paid'
        ]);

        return redirect()->route('club.players.details', $transaction->player_id)->with('success', 'Transaction updated successfully');
    }
}
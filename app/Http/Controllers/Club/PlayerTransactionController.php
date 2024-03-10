<?php

namespace App\Http\Controllers\Club;

use App\Models\Player;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlayerTransactionRequest;
use App\Repository\Club\PlayerTransaction\PlayerTransactionRepositoryInterface;

class PlayerTransactionController extends Controller
{
    /**
     * PlayerTransactionController constructor.
     *
     * @param PlayerTransactionRepositoryInterface $repository The repository for player transactions.
     */
    public function __construct(private PlayerTransactionRepositoryInterface $repository)
    {
    }

    /**
     * Store a new player transaction.
     *
     * @param  StorePlayerTransactionRequest  $request
     * @param  Player  $player
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePlayerTransactionRequest $request, Player $player) 
    {
        $this->repository->store($request->all(), $player);

        if($request->boolean('redirect_otherwise')) {
            return redirect()->route('club.player.reports', [$request->camp_id, $request->player_id])->with('success', 'Transaction added successfully');
        }

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
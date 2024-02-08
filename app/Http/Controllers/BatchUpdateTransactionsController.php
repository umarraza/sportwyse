<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Inertia\Inertia;

class BatchUpdateTransactionsController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());

        $eventModel = Transaction::find($request->eventId);
        $playerModel = Transaction::find($request->playerId);

        $transactions = Transaction::query()
            ->search()
            ->where('status', '=', 'Failed')
            ->select(
                'id',
                'camp_id',
                'player_id',
                'customer_email',
                'description',
                'status',
                'event_name',
                'created_date',
                'customer_id',
                'invoice_number',
                'amount',
                'payment_intent_id',
                'statement_descriptor',
                'customer_description',
                'application_id',
            )
            ->with('player.user:id,first_name,last_name', 'camp:id,name')
            ->orderBy('created_date', 'asc')
            ->paginate($request->paginateBySize ?? config('app.default_transactions_pagination_size'))
            ->withQueryString();

        return Inertia::render('Club/Transactions/Index', [
            'campsOptions' => $this->existingCamps(),
            'playersOptions' => $this->existingPlayers(),
            'transactions' => $transactions,
            'uniqueEvents' => $this->uniqueEvents(),
            'uniquePlayers' => $this->uniquePlayers(),
            'filters' => $request->all() + [
                'eventId' => $eventModel ? $eventModel->id : '',
                'playerId' => $playerModel ? $playerModel->id : ''
            ],
        ]);
    }

    private function uniqueEvents()
    {
        return Transaction::select('id', 'event_name')
            ->whereNotNull('event_name')
            ->distinct()->get()
            ->map(function ($event) {
                return [
                    'value' => $event->id,
                    'text' => $event->event_name,
                ];
            });
    }

    public function uniquePlayers()
    {
        return Transaction::select('id', 'description')
            ->whereNotNull('description')
            ->distinct()->get()
            ->map(function ($player) {
                return [
                    'value' => $player->id,
                    'text' => $player->description,
                ];
            });
    }

    private function existingPlayers()
    {
        return Player::with('user')
        ->get()
        ->map(function ($player) {
            return [
                'value' => $player->id,
                'text' => $player->user->name,
            ];
        });
    }

    private function existingCamps()
    {
        return Camp::get()
            ->map(function ($camp) {
                return [
                    'value' => $camp->id,
                    'text' => $camp->name,
                ];
            });
    }

    public function update(Request $request)
    {
        $models = Transaction::query()
            ->search()
            ->where('status', '=', 'Failed')
            ->get();

        foreach ($models as $model) {
            $model->update([
                'camp_id' => $request->camp_id,
                'player_id' => $request->player_id,
            ]);
        }

        return redirect()->route('stripe.index')->with('success', 'Transactions updated successfully');
    }
}

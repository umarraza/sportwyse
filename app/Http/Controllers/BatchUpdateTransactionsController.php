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
            ->paginate(10)
            ->withQueryString();

        $uniqueEvents = Transaction::select('id', 'event_name')
            ->whereNotNull('event_name')
            ->distinct()->get()
            ->map(function ($event) {
                return [
                    'value' => $event->id,
                    'text' => $event->event_name,
                ];
            });

        $uniquePlayers = Transaction::select('id', 'description')
            ->whereNotNull('description')
            ->distinct()->get()
            ->map(function ($player) {
                return [
                    'value' => $player->id,
                    'text' => $player->description,
                ];
            });

        $players = Player::with('user')
            ->get()
            ->map(function ($player) {
                return [
                    'value' => $player->id,
                    'text' => $player->user->name,
                ];
            });
            
        $camps = Camp::get()
            ->map(function ($camp) {
                return [
                    'value' => $camp->id,
                    'text' => $camp->name,
                ];
            });

        return Inertia::render('Club/Transactions/Index', [
            'campsOptions' => $camps,
            'playersOptions' => $players,
            'transactions' => $transactions,
            'uniqueEvents' => $uniqueEvents,
            'uniquePlayers' => $uniquePlayers,
            'filters' => $request->all() + [
                'eventId' => $eventModel ? $eventModel->id : '',
                'playerId' => $playerModel ? $playerModel->id : ''
            ],
        ]);
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

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
        $transactions = Transaction::query()
            ->when($request->event_name, function ($q) use ($request) {
                $q->where('event_name', $request->event_name);
            })
            ->when($request->player_name, function ($q) use ($request) {
                $q->where('description', $request->player_name);
            })
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
            ->paginate(5)
            ->withQueryString();

        $uniqueEvents = Transaction::select('event_name')
            ->whereNotNull('event_name')
            ->distinct()
            ->get();

        $uniquePlayers = Transaction::select('description')
            ->whereNotNull('description')
            ->distinct()
            ->get();

        // Retrieve players and camps
        $players = Player::with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')
            ->get();
            
        $camps = Camp::all();

        return Inertia::render('Club/Transactions/Edit', [
            'players' => $players,
            'camps' => $camps,
            'transactions' => $transactions,
            'uniqueEvents' => $uniqueEvents,
            'uniquePlayers' => $uniquePlayers,
            'filters' => $request->only([
                'event_name',
                'player_name',
            ]),
        ]);
    }

    public function update(Request $request) 
    {
        $models = Transaction::where('description', $request->player_name)
            ->orWhere('event_name', $request->event_name)
            ->where('status', 'Failed')
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

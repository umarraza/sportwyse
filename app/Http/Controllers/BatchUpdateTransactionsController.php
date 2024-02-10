<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TempTransaction;
use Inertia\Inertia;

class BatchUpdateTransactionsController extends Controller
{
    public function index(Request $request)
    {
        $totalFailedTransactionsCount = TempTransaction::failed()->count();

        $eventModel = TempTransaction::find($request->eventId);
        $playerModel = TempTransaction::find($request->playerId);

        $transactions = TempTransaction::query()
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
            ->orderBy($request->orderByParam ?? 'created_date', $request->orderBy ?? 'asc')
            ->paginate($request->paginateBySize ?? config('app.default_transactions_pagination_size'))
            ->withQueryString();

        $unAssignedCount = TempTransaction::query()
            ->where('status', '=', 'Failed')
            ->whereNull('camp_id')
            ->whereNull('player_id')
            ->count();

        $unAssignedByEventCount = TempTransaction::query()
            ->where('status', '=', 'Failed')
            ->whereNull('camp_id')
            ->count();

        $unAssignedByPlayerCount = TempTransaction::query()
            ->where('status', '=', 'Failed')
            ->whereNull('player_id')
            ->count();

        $allAssignedCount = TempTransaction::query()
            ->where('status', '=', 'Failed')
            ->whereNotNull('camp_id')
            ->whereNotNull('player_id')
            ->count();

        $assignedByEventCount = TempTransaction::query()
            ->where('status', '=', 'Failed')
            ->whereNotNull('camp_id')
            ->count();

        $assignedByPlayerCount = TempTransaction::query()
            ->where('status', '=', 'Failed')
            ->whereNotNull('camp_id')
            ->count();

        $transactionsCount = $transactions->count();

        return Inertia::render('Club/Transactions/Index', [
            'campsOptions' => $this->existingCamps(),
            'playersOptions' => $this->existingPlayers(),
            'transactions' => $transactions,
            'uniqueEvents' => $this->uniqueEvents(),
            'uniquePlayers' => $this->uniquePlayers(),
            'unAssignedCount' => $unAssignedCount,
            'transactionsCount' => $transactionsCount,
            'allAssignedCount' => $allAssignedCount,
            'unAssignedByEventCount' => $unAssignedByEventCount,
            'unAssignedByPlayerCount' => $unAssignedByPlayerCount,
            'totalFailedTransactionsCount' => $totalFailedTransactionsCount,
            'assignedByEventCount' => $assignedByEventCount,
            'assignedByPlayerCount' => $assignedByPlayerCount,
            'filters' => $request->all() + [
                'eventId' => $eventModel ? $eventModel->id : '',
                'playerId' => $playerModel ? $playerModel->id : ''
            ],
        ]);
    }

    private function uniqueEvents()
    {
        return TempTransaction::select('id', 'event_name')
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
        return TempTransaction::select('id', 'description')
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
        $models = TempTransaction::query()
            ->search()
            ->where('status', '=', 'Failed')
            ->get();

        foreach ($models as $model) {

            $updateData = [
                'camp_id' => $request->camp_id,
                'player_id' => $request->player_id,
            ];

            foreach ($models as $model) {
                $model->update(array_filter($updateData, function ($value) {
                    return $value !== null;
                }));
            }
        }

        return redirect()->route('stripe.index')->with('success', 'Transactions updated successfully');
    }
}

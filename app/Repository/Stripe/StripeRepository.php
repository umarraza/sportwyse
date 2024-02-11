<?php

namespace App\Repository\Stripe;

use App\Models\Camp;
use App\Models\Player;
use App\Models\TempTransaction;
use App\Repository\Stripe\StripeRepositoryInterface;

class StripeRepository implements StripeRepositoryInterface
{
    public function search($data)
    {
        return TempTransaction::query()
            ->search()
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
            ->orderBy($data['orderByParam'] ?? 'created_date', $data['orderBy'] ?? 'asc')
            ->paginate($data['paginateBySize'] ?? config('app.default_transactions_pagination_size'))
            ->withQueryString();
    }

    public function update($data)
    {
        $models = TempTransaction::query()
            ->failed()
            ->search()
            ->get();

        foreach ($models as $model) {

            $updateData = [
                'camp_id' => $data['camp_id'],
                'player_id' => $data['player_id'],
            ];

            foreach ($models as $model) {
                $model->update(array_filter($updateData, function ($value) {
                    return $value !== null;
                }));
            }
        }

        return redirect()->route('stripe.index')->with('success', 'Transactions updated successfully');
    }

    public function getCounts()
    {
        $q = TempTransaction::failed();

        return [
            'allAssignedCount' => $q->assigned()->count(),
            'unAssignedCount' => $q->unassigned()->count(),
            'assignedByEventCount' => $q->assignedByEvent()->count(),
            'unAssignedByEventCount' => $q->unAssignedByEvent()->count(),
            'assignedByPlayerCount' => $q->assignedByPlayer()->count(),
            'unAssignedByPlayerCount' => $q->unAssignedByPlayer()->count(),
        ];
    }

    public function uniqueEvents()
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

    public function existingPlayers()
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

    public function existingCamps()
    {
        return Camp::get()
            ->map(function ($camp) {
                return [
                    'value' => $camp->id,
                    'text' => $camp->name,
                ];
            });
    }
}

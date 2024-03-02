<?php

namespace App\Repository\Camp;

use App\Models\Camp;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use App\Repository\Camp\CampRepositoryInterface;
use Illuminate\Support\Carbon;

class CampRepository implements CampRepositoryInterface
{
    /**
     * Retrieves all camps.
     *
     * @return array
     */
    public function index()
    {
        return Camp::with('teams:id,name,start_date,end_date')->withCount('teams')->paginate(config('app.default_pagination_size'));
    }

    /**
     * Store a new camp in the database.
     *
     * @param array $data The data for the new camp.
     * @return void
     */
    public function store(array $data) {

        DB::transaction(function () use ($data) {
            
            $start_date = Carbon::parse($data['start_date']);
            $end_date = Carbon::parse($data['end_date']);

            $camp = Camp::create([
                'club_id' => auth()->user()->club->id,
                'name' => $data['name'],
                'type'  => 'public',
                'payment_type' => $data['payment_type'],
                'price' => $data['price'],
                'start_date' => $start_date,
                'end_date' => $end_date,
                'processing_fee' => $data['processing_fee'],
                'processing_fee_using_credit_card' => $data['processing_fee_using_credit_card'],
                'net_amount_using_credit_card' => $data['net_amount_using_credit_card'],
                'total_price_using_credit_card' => $data['total_price_using_credit_card'],
                'processing_fee_using_bank_account' => $data['processing_fee_using_bank_account'],
                'net_amount_using_bank_account' => $data['net_amount_using_bank_account'],
                'total_price_using_bank_account' => $data['total_price_using_bank_account'],
                'payment_pay_type' => $data['payment_pay_type'],
                'installment' => $data['installment'],
            ]);
    
            $camp->teams()->attach($data['teams'], ['joining_date' => now()]);
        });
    }

    /**
     * Update a camp with the given data.
     *
     * @param array $data The data to update the camp with.
     * @param Camp $camp The camp to be updated.
     * @return void
     */
    public function update(array $data, Camp $camp) {

        DB::transaction(function () use ($data, $camp) {
            
            $start_date = Carbon::parse($data['start_date']);
            $end_date = Carbon::parse($data['end_date']);

            $camp->update([

                'name' => $data['name'],
                'payment_type' => $data['payment_type'],
                'price' => $data['price'],
                'start_date' => $start_date,
                'end_date' => $end_date,
                'processing_fee' => $data['processing_fee'],
                'processing_fee_using_credit_card' => $data['processing_fee_using_credit_card'],
                'net_amount_using_credit_card' => $data['net_amount_using_credit_card'],
                'total_price_using_credit_card' => $data['total_price_using_credit_card'],
                'processing_fee_using_bank_account' => $data['processing_fee_using_bank_account'],
                'net_amount_using_bank_account' => $data['net_amount_using_bank_account'],
                'total_price_using_bank_account' => $data['total_price_using_bank_account'],
                'payment_pay_type' => $data['payment_pay_type'],
                'installment' => $data['installment'],
            ]);

            $existingTeams = $camp->teams()->pluck('id')->toArray();

            $newTeams = $data['teams'];

            $teamsToAdd = array_diff($newTeams, $existingTeams);

            $camp->teams()->attach($teamsToAdd, ['joining_date' => now()]);
        });
    }

    /**
     * Show a specific camp.
     *
     * @param Camp $camp The camp to be shown.
     * @return void
     */
    public function show(Camp $camp)
    {
        return $camp->load('teams:id,name');
    }

    /**
     * Destroy a camp.
     *
     * @param Camp $camp The camp to be destroyed.
     * @return void
     */
    public function destroy(Camp $camp)
    {
        $camp->delete();
    }

    /**
     * Retrieves the teams from the database.
     *
     * @return array The teams.
     */
    public function getTeams() {
        return Team::select('id', 'name')->get()
        ->map(function ($team) {
            return [
                'value' => $team->id,
                'label' => $team->name
            ];
        });
    }
}

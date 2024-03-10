<?php

namespace App\Repository\Club\PlayerTransaction;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repository\Club\PlayerTransaction\PlayerTransactionRepositoryInterface;
use DateHelper;

class PlayerTransactionRepository implements PlayerTransactionRepositoryInterface
{
    /**
     * Retrieve all teams.
     *
     * @return array
     */
    public function index()
    {
        // 
    }

    /**
     * Store a new player transaction.
     *
     * @param array $data The data for the player transaction.
     * @param Player $player The player associated with the transaction.
     * @return void
     */
    public function store(array $data, Player $player)
    {
        $player->transactions()->create([
            'created_date' => DateHelper::parseDate($data['date']),
            'amount' => $data['amount'],
            'camp_id' => $data['camp_id'],
            'payment_type' => $data['payment_type'],
            'status' => 'Paid'
        ]);
    }

    /**
     * Update a team with the given input data.
     *
     * @param array $input The input data for updating the team.
     * @param Team $team The team to be updated.
     * @return void
     */
    public function update(array $input, Team $team)
    {
        DB::transaction(function () use ($input, $team) {
            
            $team->update([
                'name' => $input['name'],
                'status' => $input['status'],
                'gender' => $input['gender'],
                'start_date' => Carbon::parse($input['birth_year_start_date']),
                'end_date' => Carbon::parse($input['birth_year_end_date']),
            ]);

            $team->staffMembers()->sync($input['staff']);
        });
    }

    /**
     * Get the current assigned staff for a team.
     *
     * @param Team $team The team object.
     * @return array The array of assigned staff members.
     */
    public function getCurrentAssignedStaff(Team $team)
    {
        return $team->staffMembers->pluck('id')->toArray();
    }
}

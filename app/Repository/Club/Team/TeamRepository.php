<?php

namespace App\Repository\Club\Team;

use App\Models\Team;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TeamRepository implements TeamRepositoryInterface
{
    /**
     * Retrieve all teams.
     *
     * @return array
     */
    public function index()
    {
        return Team::select('id', 'name', 'gender', 'start_date', 'status', 'end_date')
                    ->withCount('staffMembers')
                    ->with('staffMembers.user:id,first_name,last_name')
                    ->get();
    }

    /**
     * Store a new team in the database.
     *
     * @param array $input The input data for the team.
     * @return void
     */
    public function store(array $input)
    {
        DB::transaction(function () use ($input) {
            $team = Team::create([
                'name' => $input['name'],
                'status' => $input['status'],
                'gender' => $input['gender'],
                'start_date' => Carbon::parse($input['birth_year_start_date']),
                'end_date' => Carbon::parse($input['birth_year_end_date']),
            ]);
    
            $team->staffMembers()->attach($input['staff']);
        });

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

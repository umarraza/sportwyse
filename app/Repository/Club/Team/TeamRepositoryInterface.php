<?php

namespace App\Repository\Club\Team;

use App\Models\Team;
use Illuminate\Http\Request;

interface TeamRepositoryInterface
{
    /**
     * Retrieve all teams.
     *
     * @return array
     */
    public function index();

    /**
     * Store a new team in the database.
     *
     * @param array $input The input data for the team.
     * @return void
     */
    public function store(array $input);
    
    /**
     * Update a team with the given input data.
     *
     * @param array $input The input data for updating the team.
     * @param Team $team The team to be updated.
     * @return void
     */
    public function update(array $input, Team $team);

    /**
     * Get the current assigned staff for a team.
     *
     * @param Team $team The team object.
     * @return array The array of assigned staff members.
     */
    public function getCurrentAssignedStaff(Team $team);
}
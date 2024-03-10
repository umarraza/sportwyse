<?php

namespace App\Repository\Club\PlayerTransaction;
 
use App\Models\Team;
use App\Models\Player;

interface PlayerTransactionRepositoryInterface
{
    /**
     * Retrieve all teams.
     *
     * @return array
     */
    public function index();

    /**
     * Store a new player transaction in the repository.
     *
     * @param array $data The data for the player transaction.
     * @param Player $player The player associated with the transaction.
     * @return void
     */
    public function store(array $data, Player $player);
    
    /**
     * Update a team with the given input data.
     *
     * @param array $input The input data for updating the team.
     * @param Team $team The team to be updated.
     * @return void
     */
    public function update(array $input, Team $team);
}
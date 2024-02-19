<?php

namespace App\Repository\Player;

use App\Models\Team;
use App\Models\Player;

interface PlayerRepositoryInterface
{
    /**
     * Retrieve all players.
     *
     * @return array
     */
    public function index();

    /**
     * Show the details of a player.
     *
     * @param Player $player The player object to display.
     * @return void
     */
    public function show(Player $player);

    /**
     * Retrieve all teams for a player.
     *
     * @return array
     */
    public function teams(Player $player);

    /**
     * Updates the status of a player in a team.
     *
     * @param Team $team The team to update the player's status in.
     * @param Player $player The player whose status needs to be updated.
     * @return void
     */
    public function updateStatus(Team $team, Player $player);
}
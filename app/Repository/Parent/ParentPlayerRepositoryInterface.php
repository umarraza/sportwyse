<?php

namespace App\Repository\Parent;

use App\Models\Team;
use App\Models\Player;
use App\Models\Guardian;

interface ParentPlayerRepositoryInterface
{
    /**
     * Retrieve all players associated with a guardian.
     *
     * @param Guardian $guardian The guardian object.
     * @return array The array of parent's players objects.
     */
    public function index(Guardian $guardian);

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
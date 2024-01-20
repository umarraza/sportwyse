<?php

namespace App\Repository\Parent;

use App\Models\Team;
use App\Models\Player;
use App\Models\Guardian;
use App\Repository\Parent\ParentPlayerRepositoryInterface;

class ParentPlayerRepository implements ParentPlayerRepositoryInterface
{
    /**
     * Retrieve all players associated with a guardian.
     *
     * @param Guardian $guardian The guardian object.
     * @return array The array of parent's players objects.
     */
    public function index(Guardian $guardian)
    {
        return $guardian->players()->select('id', 'user_id', 'birth_date')
            ->has('user')
            ->with('user:id,first_name,last_name', 'teams:id,name,activity,start_date,end_date')
            ->withCount('teams')
            ->get();
        }

    /**
     * Show the details of a player.
     *
     * @param Player $player The player object to display.
     * @return void
     */
    public function show(Player $player)
    {
        return $player->load('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email');
    }

    /**
     * Retrieve all teams for a player.
     *
     * @return array
     */
    public function teams(Player $player)
    {
        return $player->teams()->select('id', 'name', 'gender', 'start_date', 'end_date')->get();
    }

    public function updateStatus(Team $team, Player $player)
    {
        $player->teams()->updateExistingPivot($team->id, [
            'status' => request('status'),
        ]);
    }
}

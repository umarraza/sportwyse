<?php

namespace App\Repository\Player;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PlayerRepository implements PlayerRepositoryInterface
{
    /**
     * Retrieve all players.
     *
     * @return array
     */
    public function index()
    {
        return Player::select('players.id', 'user_id', 'birth_date', 'gender')
            ->filter()
            ->has('user')
            ->with('user:id,first_name,last_name', 'teams')
            ->withCount('teams')
            ->paginate(config('app.default_pagination_size'))
            ->withQueryString();
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

<?php

namespace App\Http\Controllers\Staff;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Player;
use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\AddPlayerInTeamRequest;

class TeamPlayerController extends Controller
{
    public function index(Team $team)
    {
        $players = $team->players()
                        ->with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')
                        ->select('id', 'user_id', 'guardian_id', 'birth_date')
                        ->get();

        return Inertia::render('Staff/Teams/Players/Index', [
            'players' => $players,
            'team' => $team,
        ]);
    }

    public function add(Team $team) 
    {
        $players = Player::whereNotIn('id', $team->players()->pluck('id')->toArray())
                ->with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')
                ->get();

        return Inertia::render('Staff/Teams/Players/Add', [
            'team' => $team,
            'players' => $players,
        ]);
    }

    public function store(AddPlayerInTeamRequest $request, Team $team)
    {
        foreach ($request->playerForms as $player) {
            $team->players()->attach($player['id'], ['status' => $player['status']]);
        }

        return to_route('staff.teams.players.index', $team->id)->with('success', 'Player added successfully.');
    }

    public function show(Player $player)
    {
        $player->load('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email');

        return Inertia::render('Staff/Teams/Players/Show', [
            'player' => $player,
        ]);
    }

    public function delete(Team $team, Player $player)
    {
        $team->players()->detach($player->id);

        return to_route('staff.teams.players.index', $team->id)->with('success', 'Player removed successfully.');
    }

}
<?php

namespace App\Http\Controllers\Club;

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

        return Inertia::render('Club/Teams/Players/Index', [
            'players' => $players,
            'team' => $team,
        ]);
    }

    public function add(Team $team) 
    {
        $players = Player::whereNotIn('id', $team->players()->pluck('id')->toArray())
                ->with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')
                ->whereYear('birth_date', '>=' , $team->end_date->year)
                ->whereYear('birth_date', '<=' , $team->start_date->year)
                ->get();

        return Inertia::render('Club/Teams/Players/Add', [
            'team' => $team,
            'players' => $players,
        ]);
    }

    public function store(AddPlayerInTeamRequest $request, Team $team)
    {
        foreach ($request->playerForms as $player) {
            $team->players()->attach($player['id'], ['status' => $player['status']]);
        }

        return to_route('club.teams.players.index', $team->id)->with('success', 'Player added successfully.');
    }

    public function show(Player $player)
    {
        $player->load('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email');

        return Inertia::render('Club/Teams/Players/Show', [
            'player' => $player,
        ]);
    }

    public function delete(Team $team, Player $player)
    {
        $team->players()->detach($player->id);

        return to_route('club.teams.players.index', $team->id)->with('success', 'Player removed successfully.');
    }

}
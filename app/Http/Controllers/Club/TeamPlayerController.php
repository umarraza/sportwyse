<?php

namespace App\Http\Controllers\Club;

use App\Models\Team;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Player;

class TeamPlayerController extends Controller
{
    public function index(Team $team)
    {
        $players = $team->players()
                        ->with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')
                        ->select('id', 'user_id', 'guardian_id')
                        ->get();

        return Inertia::render('Club/Teams/Players/Index', [
            'players' => $players,
            'team' => $team,
        ]);
    }

    public function add(Team $team) 
    {
        $players = Player::join('player_team as pt', 'players.id', '=', 'pt.player_id')
            ->with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')
            ->where('pt.team_id', '!=', $team->id)
            ->get();

        return Inertia::render('Club/Teams/Players/Add', [
            'team' => $team,
            'players' => $players,
        ]);
    }

    public function store(Request $request, Team $team)
    {
        foreach ($request->playerForms as $player) {
            $team->players()->attach($player['info']['id'], ['status' => $player['status']]);
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

}
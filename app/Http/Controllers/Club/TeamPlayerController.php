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
                        ->with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name')
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

    public function addPlayer(Request $request, Team $team)
    {
        foreach ($request->players as $player) {
            $team->players()->attach($player['id'], ['status' => $player['status']]);
        }

        return to_route('staff.teams.index')->with('success', 'Player added successfully.');
    }
}
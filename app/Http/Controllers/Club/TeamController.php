<?php

namespace App\Http\Controllers\Club;

use App\Models\Team;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\AddPlayerInTeamRequest;

class TeamController extends Controller
{
    public function index() 
    {
        $teams = Team::select('id', 'name', 'gender', 'start_date', 'end_date', 'is_archived')->withCount('staffMembers')->with('staffMembers.user:id,first_name,last_name')->get();

        $players = DB::table('players as p')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->select('p.id', DB::raw("CONCAT(u.first_name, ' ', u.last_name) AS name"))
            ->get();

        return Inertia::render('Club/Teams/Index', [
            'teams' => $teams,
            'players' => $players,
        ]);    
    }

    public function create() {
        return Inertia::render('Club/Teams/Create');    
    }

    public function addPlayer(AddPlayerInTeamRequest $request, Team $team)
    {
        foreach ($request->players as $player) {
            $team->players()->attach($player['id'], ['status' => $player['status']]);
        }

        return to_route('staff.teams.index')->with('success', 'Player added successfully.');
    }
}

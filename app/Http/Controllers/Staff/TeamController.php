<?php

namespace App\Http\Controllers\Staff;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Player;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\AddPlayerInTeamRequest;

class TeamController extends Controller
{
    public function index()
    {
        $staff = auth()->user()->staff;

        $teams = $staff->teams()->select('teams.id', 'name', 'gender', 'start_date', 'end_date', 'is_archived')->withCount('players')->with('players.user:id,first_name,last_name')->get();

        $players = DB::table('players as p')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->select('p.id', DB::raw("CONCAT(u.first_name, ' ', u.last_name) AS name"))
            ->get();

        return Inertia::render('Staff/Teams/Index', [
            'teams' => $teams,
            'players' => $players,
        ]);
    }

    public function addPlayer(AddPlayerInTeamRequest $request, Team $team)
    {
        dd($request->players);

        foreach ($request->players as $player) {
            $team->players()->attach($player['id'], ['status' => $player['status']]);
        }

        return to_route('staff.teams.index')->with('success', 'Player added successfully.');
    }

    public function deletePlayer(Team $team, Player $player)
    {
        $team->players()->detach($player->id);

        return to_route('staff.teams.index')->with('success', 'Player removed successfully.');
    }
}

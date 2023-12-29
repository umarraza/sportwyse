<?php

namespace App\Http\Controllers\Staff;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
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
        try {
            foreach ($request->players as $player) {
                $team->players()->attach($player['id']['id'], ['status' => $player['status']]);
            }
        } catch (\Throwable $th) {
            dd($th);
        }

        return Redirect::route('staff.teams.index');
        // return redirect()->route('staff.teams.index')->with('success', 'Student created successfully.');

    }

    public function deletePlayer(Team $team, Player $player)
    {
        $team->players()->detach($player->id);

        return response()->noContent();
    }
}

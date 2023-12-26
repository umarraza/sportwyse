<?php

namespace App\Http\Controllers\Staff;

use App\Models\Team;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index() 
    {
        $staff = auth()->user()->staff;

        $teams = $staff->teams()->select('teams.id', 'name', 'gender', 'start_date', 'end_date', 'is_archived')->withCount('players')->with('players.user:id,first_name,last_name')->get();

        $players = DB::table('players as p')
            ->leftJoin('player_team as pt', function ($join) {
                $join->on('p.id', '=', 'pt.player_id')
                    ->where('pt.status', '=', 'Primary');
            })
            ->leftJoin('users as u', 'u.id', '=', 'p.user_id')
            ->select('p.id', DB::raw("CONCAT(u.first_name, ' ', u.last_name) AS name"))
            ->whereNull('pt.team_id')
            ->orWhere('pt.status', '=', 'Guest')
            ->get();

        return Inertia::render('Staff/Teams/Index', [
            'teams' => $teams,
            'players' => $players,
        ]);    
    }

    public function create() {
        return Inertia::render('Club/Teams/Create');    
    }
}
<?php

namespace App\Http\Controllers\Club;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Player;
use App\Models\Transaction;
use App\Http\Controllers\Controller;

class ReportingController extends Controller
{
    public function index()
    {
        $teams = Team::select('id', 'name', 'gender', 'start_date', 'end_date')
            ->withCount(['staffMembers', 'players'])
            ->with('staffMembers.user:id,first_name,last_name', 'players')
            ->has('players')
            ->get();

        return Inertia::render('Club/Reports/Index', [
            'teams' => $teams,
        ]);
    }

    public function playerReports(Team $team)
    {
        $players =  $team->players()->select('id', 'user_id', 'birth_date')
                    ->has('user')
                    ->with('user:id,first_name,last_name', 'teams')
                    ->withCount('teams')
                    ->get();

        return Inertia::render('Club/Reports/Teams', [
            'team' => $team,
            'players' => $players
        ]);
    }

    public function finalReport(Team $team, Player $player)
    {
        $transactions = Transaction::where('player_id', $player->id)->get();

        return Inertia::render('Club/Reports/FinalReport', [
            'team' => $team,
            'player' => $player,
            'transactions' => $transactions
        ]);
    }
}

<?php

namespace App\Http\Controllers\Club;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Player;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Repository\Stripe\StripeRepositoryInterface;
use Carbon\Carbon;

class ReportingController extends Controller
{
    public function index(Request $request)
    {
        $camp = Camp::find($request->camp_id);
        $from_date = Carbon::parse('2024-04-17');

        $teams = $camp->teams()
        ->wherePivot('joining_date', '>=', $request->from_date)
        ->get();

        dd($teams);












        $camps = app(StripeRepositoryInterface::class)->existingCamps();

        $teams = [];
        if ($request->camp_id) {
            $camp = Camp::find($request->camp_id);
            
            $teams = $camp->whereHas('teams', function($q) use ($request) {
                $q->wherePivot('joining_date', '>=', $request->from_date);
            })->get();

            dd($teams);

        } else {
            $teams = Team::select('teams.id', 'teams.name', 'teams.gender', 'teams.start_date', 'teams.end_date')
                ->withCount(['players'])
                ->get();
        }

        return Inertia::render('Club/Reports/Index', [
            'camps' => $camps,
            'teams' => $teams,
            'filters' => $request->all(),
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

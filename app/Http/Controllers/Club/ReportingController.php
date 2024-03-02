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

class ReportingController extends Controller
{
    public function index(Request $request)
    {
        $camps = app(StripeRepositoryInterface::class)->existingCamps();

        $teams = [];

        if ($request->camp_id) {
            $camp = Camp::find($request->camp_id);
            
            $q = $camp->teams();

            if ($request->from_date) {
                $q->wherePivot('joining_date', '>=', $request->from_date);
            }

            if ($request->to_date) {
                $q->wherePivot('joining_date', '<=', $request->to_date);
            }

            if ($request->from_date && $request->to_date) {
                $q->wherePivot('joining_date', '>=', $request->from_date)
                    ->wherePivot('joining_date', '<=', $request->to_date);
            }

            $q->withCount(['players']);

            $teams = $q->paginate(config('app.default_pagination_size'))->withQueryString();

        } else {
            // $teams = Team::select('teams.id', 'teams.name', 'teams.gender', 'teams.start_date', 'teams.end_date')
            //     ->withCount(['players'])
            //     ->paginate(config('app.default_pagination_size'));
        }

        return Inertia::render('Club/Reports/Index', [
            'camps' => $camps,
            'teams' => $teams,
            'prop_filters' => $request->all(),
        ]);
    }

    public function playerReports(Camp $camp, Team $team)
    {
        $players =  $team->players()->select('id', 'user_id', 'birth_date')
                    ->has('user')
                    ->wherePivot('status', 'Primary')
                    ->with('user:id,first_name,last_name', 'teams')
                    ->withCount('teams')
                    ->get();

        return Inertia::render('Club/Reports/Teams', [
            'team' => $team,
            'camp' => $camp,
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

// In the teams screen, we will show all teams by default, and onnce the user selects an event, we will show the teams that are part of that event. We will also allow the user to filter the teams by date range
// The date range will include from date and to date. Suppose if an event is from 1st Jan 2020 to 31st Jan 2022, then the user can filter the teams that are part of this event by selecting the date range from 1st Jan 2020 to 31st Jan 2022
// So the total number of months will be 24 months. Since we can't show 24 months in a single table, we will give antoher option to the user to filter the teams by month and year. So the user can select the month and year from the dropdown and we will show the teams that are part of that month and year
// So, maximum number of months can be 12 and min number of months can be 1 if user has selected a date range of 1 month.
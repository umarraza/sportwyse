<?php

namespace App\Http\Controllers\Club;

use DateHelper;
use App\Models\Camp;
use App\Models\Team;
use Inertia\Inertia;
use App\Models\Player;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\JoinClause;
use App\Repository\Stripe\StripeRepositoryInterface;

class ReportingController extends Controller
{
    /**
     * Display the index page of the ReportingController.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $camps = app(StripeRepositoryInterface::class)->existingCamps();

        $teams = collect([]);

        if ($request->camp_id) {
            $teams = Team::join('camp_team as ct', function (JoinClause $join) use ($request) {
                $join->on('teams.id', '=', 'ct.team_id')
                ->where('ct.camp_id', $request->camp_id);    
            })
            ->when($request->from_date, function ($query) use ($request) {
                $query->whereDate('ct.joining_date', '>=', $request->date('from_date'));
            })
            ->when($request->to_date, function ($query) use ($request) {
                $query->whereDate('ct.joining_date', '<=', $request->date('to_date'));
            })
            ->when($request->from_date && $request->to_date, function ($query) use ($request) {
                $query->whereDate('ct.joining_date', '>=', $request->date('from_date'))
                    ->whereDate('ct.joining_date', '<=', $request->date('to_date'));
            })
            ->select('teams.id', 'teams.name', 'teams.gender', 'ct.joining_date', 'ct.leaving_date', 'ct.active')
            ->orderBy('ct.joining_date', 'asc')
            ->groupBy('teams.id', 'teams.name', 'teams.gender', 'ct.joining_date', 'ct.leaving_date', 'ct.active')
            ->paginate(config('app.default_pagination_size'))->withQueryString();
        }

        return Inertia::render('Club/Reports/Index', [
            'camps' => $camps,
            'teams' => $teams,
            'prop_filters' => $request->all(),
        ]);
    }

    /**
     * Retrieves player reports based on the given request, camp, and team.
     *
     * @param Request $request The HTTP request object.
     * @param Camp $camp The camp object.
     * @param Team $team The team object.
     * @return \Illuminate\Http\Response|\Inertia\Response
     */
    public function playerReports(Request $request, Camp $camp, Team $team)
    {
        $from_date = null;
        $to_date = null;

        if ($request->from_date) {
            $from_date = DateHelper::parseDate($request->from_date);
        }

        if ($request->to_date) {
            $to_date = DateHelper::parseDate($request->to_date);
        }

        $year = $request->year;

        $q = Player::where('team_id', $team->id)
        ->join('users', 'players.user_id', '=', 'users.id')
        ->join('transactions', function (JoinClause $join) use ($year, $camp, $from_date, $to_date) {
            $join->on('players.id', '=', 'transactions.player_id')
                ->where('transactions.camp_id', $camp->id)
                ->when($from_date && !$to_date, function ($query) use ($from_date) {
                    $query->whereDate('transactions.created_date', '>=', $from_date);
                })
                ->when($to_date && !$from_date, function ($query) use ($to_date) {
                    $query->whereDate('transactions.created_date', '<=', $to_date);
                })
                ->when($from_date && $to_date, function ($query) use ($from_date, $to_date) {
                    $query->whereDate('transactions.created_date', '>=', $from_date)
                        ->whereDate('transactions.created_date', '<=', $to_date);
                })
                ->when($year, function ($query, $year) {
                    $query->whereYear('transactions.created_date', $year);
                });
        })
        ->join('player_team as pt', function (JoinClause $join) use ($team) {
            $join->on('players.id', '=', 'pt.player_id')
                ->where('pt.status', 'Primary');
        })
        ->select('players.id', 'transactions.camp_id', 'users.first_name', 'users.last_name', 'users.email', 'pt.player_id', 'pt.status')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 1 THEN transactions.amount ELSE 0 END) AS Jan')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 2 THEN transactions.amount ELSE 0 END) AS Feb')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 3 THEN transactions.amount ELSE 0 END) AS Mar')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 4 THEN transactions.amount ELSE 0 END) AS Apr')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 5 THEN transactions.amount ELSE 0 END) AS May')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 6 THEN transactions.amount ELSE 0 END) AS Jun')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 7 THEN transactions.amount ELSE 0 END) AS Jul')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 8 THEN transactions.amount ELSE 0 END) AS Aug')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 9 THEN transactions.amount ELSE 0 END) AS Sep')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 10 THEN transactions.amount ELSE 0 END) AS Oct')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 11 THEN transactions.amount ELSE 0 END) AS Nov')
        ->selectRaw('SUM(CASE WHEN MONTH(transactions.created_date) = 12 THEN transactions.amount ELSE 0 END) AS `Dec`')
        ->selectRaw('MIN(transactions.created_date) as min_date')
        ->selectRaw('MAX(transactions.created_date) as max_date')
        ->groupBy('players.id', 'transactions.camp_id', 'users.first_name', 'users.last_name', 'users.email', 'pt.player_id', 'pt.status');

        $players = $q->get();

        $minDate = Carbon::parse($players->min('min_date'));
        $maxDate = Carbon::parse($players->max('max_date'));

        $yearDiff = 1;

        if ($from_date && $to_date) {
            $yearDiff = $to_date->diffInYears($from_date);
        } else {
            $yearDiff = $maxDate->diffInYears($minDate);
        }

        if ((!$from_date && !$to_date) || !$request->to_date) {

            $models = Team::join('player_team as pt', function (JoinClause $join) use ($team) {
                $join->on('teams.id', '=', 'pt.team_id')
                    ->where('pt.team_id', $team->id);
            })->join('transactions', function (JoinClause $join) use ($camp) {
                $join->on('pt.player_id', '=', 'transactions.player_id')
                    ->where('transactions.camp_id', $camp->id);
            })
            ->selectRaw('MIN(transactions.created_date) as min_date')
            ->selectRaw('MAX(transactions.created_date) as max_date')
            ->get();

            $minDate = Carbon::parse($models->min('min_date'));
            $maxDate = Carbon::parse($models->max('max_date'));

            $year = $maxDate->year;
            $yearDiff = $maxDate->diffInYears($minDate);
        }

        // If the difference is less than or equal to 0, it means there is no data or only one year of data
        // In this case, you can provide a default range of years, such as the current year
        if ($yearDiff <= 0) {
            $startYear = date('Y');
            $years = [$startYear];
        } else {
            // If there is more than one year of data, create an array of years spanning from the earliest to the latest year
            $startYear = $from_date ? $from_date->year : $minDate->year;
            $endYear = $to_date ? $to_date->year : $maxDate->year;
            $years = range($startYear, $endYear);
        }

        $formattedYears = array_map(function ($year) {
            return strval($year);
        }, $years);

        if ($request->boolean('requireJson')) {

            $response = [
                'players' => $players,
                'yearDiff' => $yearDiff,
                'propYears' => $formattedYears,
            ];

            return response()->json($response);
        }

        $campsOptions = app(StripeRepositoryInterface::class)->existingCamps();

        return Inertia::render('Club/Reports/Players', [
            'team' => $team,
            'camp' => $camp,
            'players' => $players,
            'yearDiff' => $yearDiff,
            'campsOptions' => $campsOptions,
            'from_date' => $from_date ? $from_date->format('Y-m-d') : '',
            'to_date' => $to_date ? $to_date->format('Y-m-d') : '',
            'propYears' => $formattedYears,
        ]);
    }

    /**
     * Generate the final report based on the given request parameters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function payments(Request $request)
    {
        $from_date = DateHelper::parseDate($request->from_date);
        $to_date = DateHelper::parseDate($request->to_date);

        $payments = Transaction::where('player_id', $request->player_id)
            ->where('camp_id', $request->camp_id)
            ->when($from_date && !$to_date, function ($query) use ($from_date) {
                $query->whereDate('transactions.created_date', '>=', $from_date)
                    ->whereYear('transactions.created_date', $from_date->year);
            })
            ->when($to_date && !$from_date, function ($query) use ($to_date) {
                $query->whereDate('transactions.created_date', '<=', $to_date)
                    ->whereYear('transactions.created_date', $to_date->year);
            })
            ->when($from_date && $to_date, function ($query) use ($from_date, $to_date) {
                $query->whereDate('transactions.created_date', '>=', $from_date)
                    ->whereDate('transactions.created_date', '<=', $to_date);
            })
            ->where(function ($query) use ($request) {
                $query->whereYear('transactions.created_date', $request->year)
                ->orWhereRaw('MONTH(created_date) = ?', [date('m', strtotime($request->month))]);
            })
            ->select('id', DB::raw("DATE_FORMAT(created_date, '%m-%d-%Y') as date"), 'amount', 'payment_type')
            ->get();

        return response()->json($payments);
    }
}

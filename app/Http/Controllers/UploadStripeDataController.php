<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Inertia\Inertia;
use App\Models\Player;
use App\Models\SearchFilter;
use Illuminate\Http\Request;
use App\Models\TempTransaction;
use App\Imports\TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Repository\Stripe\StripeRepositoryInterface;

class UploadStripeDataController extends Controller
{
    /**
     * UploadStripeDataController constructor.
     *
     * @param StripeRepositoryInterface $repository The stripe repository interface.
     */
    public function __construct(private StripeRepositoryInterface $repository)
    {
    }

    /**
     * Retrieve a paginated list of transactions with optional filters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $totalFailedTransactionsCount = TempTransaction::failed()->count();

        $camps              = Camp::where('club_id', auth()->user()->club->id)->get;
        $eventModel         = TempTransaction::find($request->eventId);
        $playerModel        = TempTransaction::find($request->playerId);
        $players            = Player::with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')->get();

        $transactions       = $this->repository->search($request->all());
        $transactionsCount  = $transactions->count();
        $counts             = $this->repository->getCounts();


        $savedFilters = SearchFilter::with(['camp:id,name','player.user:id,first_name,last_name'])->get();

        return Inertia::render('Stripe/Index', [
            'camps' => $camps,
            'players' => $players,
            'savedFilters' => $savedFilters,
            'transactions' => $transactions,
            'uniqueEvents' => $this->repository->uniqueEvents(),
            'campsOptions' => $this->repository->existingCamps(),
            'uniquePlayers' => $this->repository->uniquePlayers(),
            'playersOptions' => $this->repository->existingPlayers(),
            'unAssignedCount' => $counts['unAssignedCount'],
            'allAssignedCount' => $counts['allAssignedCount'],
            'transactionsCount' => $transactionsCount,
            'unAssignedByEventCount' => $counts['unAssignedByEventCount'],
            'unAssignedByPlayerCount' => $counts['unAssignedByPlayerCount'],
            'assignedByEventCount' => $counts['assignedByEventCount'],
            'assignedByPlayerCount' => $counts['assignedByPlayerCount'],
            'totalFailedTransactionsCount' => $totalFailedTransactionsCount,
            'filters' => $request->all() + [
                'eventId' => $eventModel ? $eventModel->id : '',
                'playerId' => $playerModel ? $playerModel->id : ''
            ],
        ]);
    }

    /**
     * Render the Stripe create page.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Stripe/Create');
    }

    /**
     * Store the transactions from the uploaded file.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Excel::import(new TransactionsImport(), $request->file('file'));

        return redirect()->route('stripe.index')->with('success', 'Transactions imported successfully');
    }

    /**
     * Render the Stripe edit page.
     *
     * @return \Inertia\Response
     */
    public function edit(Request $request)
    {
        $totalFailedTransactionsCount = TempTransaction::failed()->count();

        $camps              = Camp::where('club_id', auth()->user()->club->id)->get;
        $eventModel         = TempTransaction::find($request->eventId);
        $playerModel        = TempTransaction::find($request->playerId);
        $players            = Player::with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')->get();

        $transactions       = $this->repository->search($request->all());
        $transactionsCount  = $transactions->count();
        $counts             = $this->repository->getCounts();

        return Inertia::render('Stripe/Edit', [
            'camps' => $camps,
            'players' => $players,
            'transactions' => $transactions,
            'uniqueEvents' => $this->repository->uniqueEvents(),
            'campsOptions' => $this->repository->existingCamps(),
            'uniquePlayers' => $this->repository->uniquePlayers(),
            'playersOptions' => $this->repository->existingPlayers(),
            'unAssignedCount' => $counts['unAssignedCount'],
            'allAssignedCount' => $counts['allAssignedCount'],
            'transactionsCount' => $transactionsCount,
            'unAssignedByEventCount' => $counts['unAssignedByEventCount'],
            'unAssignedByPlayerCount' => $counts['unAssignedByPlayerCount'],
            'assignedByEventCount' => $counts['assignedByEventCount'],
            'assignedByPlayerCount' => $counts['assignedByPlayerCount'],
            'totalFailedTransactionsCount' => $totalFailedTransactionsCount,
            'filters' => $request->all() + [
                'eventId' => $eventModel ? $eventModel->id : '',
                'playerId' => $playerModel ? $playerModel->id : ''
            ],
        ]);
    }

    public function update(Request $request)
    {
        $this->repository->update($request->all());

        return redirect()->route('stripe.index')->with('success', 'Transactions updated successfully');
    }
}
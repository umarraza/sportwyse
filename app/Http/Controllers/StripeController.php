<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Inertia\Inertia;
use App\Models\Player;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Imports\TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;

class StripeController extends Controller
{
    /**
     * Retrieve a paginated list of transactions with optional filters.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        // Retrieve transactions with optional filters
        $transactions = Transaction::query()
            ->when($request->camp_id, function ($q) use ($request) {
                $q->where('camp_id', $request->camp_id);
            })
            ->when($request->player_id, function ($q) use ($request) {
                $q->where('player_id', $request->player_id);
            })
            ->when($request->email, function ($q) use ($request) {
                $q->where('customer_email', 'like', "%{$request->email}%");
            })
            ->when($request->customer_description, function ($q) use ($request) {
                $q->where('customer_description', 'like', "%{$request->customer_description}%");
            })
            ->when($request->status, function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->customer_id, function ($q) use ($request) {
                $q->where('customer_id', $request->customer_id);
            })
            ->when($request->event_name, function ($q) use ($request) {
                $q->where('event_name', 'like', "%{$request->event_name}%");
            })
            ->when(request()->boolean('allUnAssigned'), function ($q) {
                $q->whereNull('player_id')->whereNull('camp_id');
            })
            ->when(request()->boolean('unAssignedByEvent'), function ($q) {
                $q->whereNull('camp_id');
            })
            ->when(request()->boolean('unAssignedByPlayer'), function ($q) {
                $q->whereNull('player_id');
            })
            ->when(request()->boolean('allAssigned'), function ($q) {
                $q->whereNotNull('player_id')->whereNotNull('camp_id');
            })
            ->when(request()->boolean('assignedByEvent'), function ($q) {
                $q->whereNotNull('camp_id');
            })
            ->when(request()->boolean('assignedByPlayer'), function ($q) {
                $q->whereNotNull('player_id');
            })
            ->select(
                'id',
                'camp_id',
                'player_id',
                'customer_email',
                'description',
                'status',
                'event_name',
                'created_date',
                'customer_id',
                'invoice_number',
                'amount',
                'customer_description',
                'application_id',
            )
            ->with('player.user:id,first_name,last_name', 'camp:id,name')
            ->paginate($request->paginateBySize ?? config('app.default_transactions_pagination_size'))
            ->withQueryString();

        // Retrieve players and camps
        $players = Player::with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')
            ->get();
            
        $camps = Camp::all();

        return Inertia::render('Stripe/Index', [
            'transactions' => $transactions,
            'camps' => $camps,
            'players' => $players,
            'filters' => $request->only([
                'camp_id',
                'player_id',
                'email',
                'customer_description',
                'status',
                'customer_id',
                'event_name',
                'allUnAssigned',
                'unAssignedByEvent',
                'unAssignedByPlayer',
                'allAssigned',
                'paginateBySize',
                'assignedByEvent',
                'assignedByPlayer',
            ]),
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
}


// Dynamic paggination
// Checkboxes for filtering transactions by of event name, player name, and status 
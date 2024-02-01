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
    public function index(Request $request)
    {
        $transactions = Transaction::query()
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
                'payment_intent_id',
                'statement_descriptor',
                'customer_description',
                'application_id',
            )
            ->with('player.user:id,first_name,last_name', 'camp:id,name')
            ->paginate(10)
            ->withQueryString();

        $players = Player::with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')
                ->get();

        $camps = Camp::all();

        return Inertia::render('Stripe/Index', [
            'transactions' => $transactions,
            'camps' => $camps,
            'players' => $players,
            'filters' => $request->only([
                'email',
                'customer_description',
                'status',
                'customer_id',
                'event_name',
            ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Stripe/Create');
    }

    public function store(Request $request)
    {
        Excel::import(new TransactionsImport(), $request->file('file'));

        return redirect()->route('stripe.index')->with('success', 'Transactions imported successfully');

    }

    public function filter(Request $request)
    {
        $q = Transaction::with('player.user:id,first_name,last_name', 'camp:id,name');

        if ($request->email) {
            $q->where('customer_email', $request->email);
        }

        if ($request->customer_description) {
            $q->where('customer_description', $request->customer_description);
        }

        if ($request->status) {
            $q->where('status', $request->status);
        }

        if ($request->customer_id) {
            $q->where('customer_id', $request->customer_id);
        }

        if ($request->event_name) {
            $q->where('event_name', $request->event_name);
        }

        $camps = Camp::all();

        $players = Player::with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')->get();

        $transactions = $q->paginate(10);

        return Inertia::render('Stripe/Index', [
            'transactions' => $transactions,
            'camps' => $camps,
            'players' => $players,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Inertia\Inertia;
use App\Models\Player;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TempTransaction;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::query()
            ->search()
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
        
        $camps = Camp::all();
        $players = Player::with('user:id,first_name,last_name', 'guardian.user:id,first_name,last_name,email')
            ->get();

        return Inertia::render('Transactions/Index', [
            'transactions' => $transactions,
            'camps' => $camps,
            'players' => $players,
        ]);

        return view('transactions.index', compact('transactions'));
    }

    public function proccess(Request $request)
    {
        $count = TempTransaction::failed()->whereNull('camp_id')->whereNull('player_id')->count();

        if ($count) {
            return redirect()->back()->with('warning', 'Please assign all transactions to events and players before processing.'); 
        }

        $tempTransactions = TempTransaction::failed()->whereNotNull('camp_id')->whereNotNull('player_id')->with('camp', 'player')->get();

        foreach ($tempTransactions as $tempTransaction) 
        {
            Transaction::create($tempTransaction->toArray());
            
            $tempTransaction->delete();
        }


        return redirect()->route('transactions.index')->with('success', 'Transactions processed successfully'); 
    }
}

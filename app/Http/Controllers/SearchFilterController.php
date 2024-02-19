<?php

namespace App\Http\Controllers;

use App\Models\SearchFilter;
use Illuminate\Http\Request;
use App\Models\TempTransaction;
use App\Http\Requests\StoreSearchFiltersRequest;

class SearchFilterController extends Controller
{
    public function store(Request $request)
    {
        SearchFilter::create([
            'search_name' => $request->search_name,
            'camp_id' => $request->camp_id,
            'player_id' => $request->player_id,
            'event_name' => $request->oldCampName,
            'player_name' => $request->oldPlayerName,
            'from_date' => $request->date('fromDate'),
            'to_date' => $request->date('toDate'),
            'from_amount' => $request->fromAmount,
            'to_amount' => $request->toAmount,
        ]);

        return redirect()->route('stripe.index')->with('success', 'Search filter created successfully');
    }

    public function run(Request $request)
    {
        foreach ($request->scripts as $script) 
        {
            $script = SearchFilter::find($script);

            $script->run();
        }

        return redirect()->route('stripe.index')->with('success', 'Scripts ran successfully.');
    }
}

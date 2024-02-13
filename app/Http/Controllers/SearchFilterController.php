<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSearchFiltersRequest;
use App\Models\SearchFilter;

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
}

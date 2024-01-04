<?php

namespace App\Http\Controllers\Club;

use App\Models\Camp;
use App\Models\Team;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Club\StoreCampRequest;

class CampController extends Controller
{
    public function index() 
    {
        $camps = Camp::with('teams:id,name,start_date,end_date')->withCount('teams')->paginate(10);

        return Inertia::render('Club/Camps/Index', [
            'camps' => $camps
        ]);
    }

    public function create() {

        return Inertia::render('Club/Camps/Create', [
            'teams' => $this->getTeams()
        ]);    
    }

    public function store(StoreCampRequest $request) {

        DB::transaction(function () use ($request) {
            
            $camp = Camp::create([
                'club_id' => auth()->user()->club->id,
                'name' => $request->name,
                'type'  => 'public',
                'payment_type' => $request->payment_type,
                'price' => $request->price,
                'start_date' => $request->date('start_date'),
                'end_date' => $request->date('end_date'),
                'processing_fee' => $request->processing_fee,
                'processing_fee_using_credit_card' => $request->processing_fee_using_credit_card,
                'net_amount_using_credit_card' => $request->net_amount_using_credit_card,
                'total_price_using_credit_card' => $request->total_price_using_credit_card,
                'processing_fee_using_bank_account' => $request->processing_fee_using_bank_account,
                'net_amount_using_bank_account' => $request->net_amount_using_bank_account,
                'total_price_using_bank_account' => $request->total_price_using_bank_account,
                'payment_pay_type' => $request->payment_pay_type,
                'installment' => $request->installment,
            ]);
    
            $camp->teams()->attach($request->teams);

        });

        return redirect()->route('club.camps.index')->with('success', 'Event created successfully.');
    }

    public function edit(Camp $camp) {

        $camp->load('teams:id,name');

        $currentTeams = $camp->teams->pluck('id')->toArray();

        return Inertia::render('Club/Camps/Edit', [
            'currentTeams' => $currentTeams,
            'teams' => $this->getTeams(),
            'camp' => $camp,
        ]);    
    }

    public function update(StoreCampRequest $request, Camp $camp) {


        DB::transaction(function () use ($request, $camp) {
            
            $camp->update([
                'name' => $request->name,
                'payment_type' => $request->payment_type,
                'price' => $request->price,
                'start_date' => $request->date('start_date'),
                'end_date' => $request->date('end_date'),
                'processing_fee' => $request->processing_fee,
                'processing_fee_using_credit_card' => $request->processing_fee_using_credit_card,
                'net_amount_using_credit_card' => $request->net_amount_using_credit_card,
                'total_price_using_credit_card' => $request->total_price_using_credit_card,
                'processing_fee_using_bank_account' => $request->processing_fee_using_bank_account,
                'net_amount_using_bank_account' => $request->net_amount_using_bank_account,
                'total_price_using_bank_account' => $request->total_price_using_bank_account,
                'payment_pay_type' => $request->payment_pay_type,
                'installment' => $request->installment,
            ]);
    
            $camp->teams()->sync($request->teams);

        });

        return redirect()->route('club.camps.index')->with('success', 'Event updated successfully.');
    }

    public function show(Camp $camp) {

        $camp->load('teams:id,name');

        return Inertia::render('Club/Camps/Show', [
            'camp' => $camp
        ]);
    }

    public function destroy(Camp $camp) {

        $camp->delete();

        return response()->json([
            'message' => 'Event deleted successfully.'
        ]);

        return redirect()->route('club.camps.index')->with('success', 'Event deleted successfully.');
    }

    private function getTeams() {
        return Team::select('id', 'name')->get()
        ->map(function ($team) {
            return [
                'value' => $team->id,
                'label' => $team->name
            ];
        });
    }
}
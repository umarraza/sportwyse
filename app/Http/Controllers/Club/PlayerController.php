<?php

namespace App\Http\Controllers\Club;

use App\Models\Camp;
use App\Models\Team;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Player;
use App\Models\Guardian;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Club\StoreCampRequest;
use App\Http\Requests\Club\StorePlayerRequest;

class PlayerController extends Controller
{
    public function index() 
    {
        $players = Player::select('id', 'user_id', 'birth_date')
                        ->has('user')
                        ->has('teams')
                        ->with('user:id,first_name,last_name', 'teams:id,name,activity,start_date,end_date')
                        ->withCount('teams')
                        ->get();

        return Inertia::render('Club/Players/Index', [
            'players' => $players
        ]);    
    }

    public function create(Guardian $parent) {

        $parent->load('user');

        return Inertia::render('Club/Parents/Players/Create', [
            'parent' => $parent,
        ]);    
    }

    public function store(StorePlayerRequest $request, Guardian $parent) {

        DB::transaction(function () use ($request, $parent) {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make(Str::random(8)),
            ]);
    
            $user->assignRole('Player');

            $user->player()->create([
                'guardian_id' => $parent->id,
                'club_id' => auth()->user()->club->id,
                'birth_date' => $request->date('birth_day'),
                'phone' => $request->phone,
                'gender' => $request->gender,
                'gender' => $request->gender,
                'city' => $request->city,
                'state' => $request->state,
                'zip_code' => $request->zip_code,
            ]);
        });

        return redirect()->route('club.parents.index')->with('success', 'Player created successfully.');
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

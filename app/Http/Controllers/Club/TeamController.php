<?php

namespace App\Http\Controllers\Club;

use App\Models\Team;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index() 
    {
        $teams = Team::select('id', 'name', 'gender', 'start_date', 'end_date', 'is_archived')->withCount('staffMembers')->with('staffMembers.user:id,first_name,last_name')->get();

        return Inertia::render('Club/Teams/Index', [
            'teams' => $teams
        ]);    
    }
}

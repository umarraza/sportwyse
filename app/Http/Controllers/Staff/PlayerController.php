<?php

namespace App\Http\Controllers\Staff;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Player;

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
}

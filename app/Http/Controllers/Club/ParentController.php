<?php

namespace App\Http\Controllers\Club;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Guardian;
use App\Http\Controllers\Controller;

class ParentController extends Controller
{
    public function index() 
    {
        $parents = Guardian::with('players.user:id,first_name,last_name', 'user:id,first_name,last_name,email')->has('players')->withCount('players')->get();

        return Inertia::render('Club/Parents/Index', [
            'parents' => $parents
        ]);    
    }
}

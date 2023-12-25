<?php
namespace App\Http\Controllers\Staff;

use App\Models\Camp;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

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
        return Inertia::render('Club/Camps/Create');    
    }
}
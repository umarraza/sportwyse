<?php

namespace App\Http\Controllers\Staff;

use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repository\Staff\Team\StaffTeamRepositoryInterface;

class TeamController extends Controller
{
    /**
     * Create a new TeamController instance.
     *
     * @param StaffTeamRepositoryInterface $repository The team repository instance.
     */
    public function __construct(private StaffTeamRepositoryInterface $repository)
    {
    }

    public function index()
    {
        $players = DB::table('players as p')
            ->join('users as u', 'u.id', '=', 'p.user_id')
            ->select('p.id', DB::raw("CONCAT(u.first_name, ' ', u.last_name) AS name"))
            ->get();

        return Inertia::render('Staff/Teams/Index', [
            'teams' => $this->repository->index(),
            'players' => $players,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Staff;

use App\Models\Team;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Club\StoreTeamRequest;
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

    /**
     * Edit a team.
     *
     * @param Team $team The team to be edited.
     * @return Response
     */
    public function edit(Team $team)
    {
        return Inertia::render('Staff/Teams/Edit', [
            'team' => $team,
            'currentStaff' => $this->repository->getCurrentAssignedStaff($team)
        ]);    
    }

    /**
     * Update the specified team in storage.
     *
     * @param  \App\Http\Requests\StoreTeamRequest  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTeamRequest $request, Team $team)
    {
        $this->repository->update($request->all(), $team);

        return redirect()->route('staff.teams.index')->with('success', 'Team updated successfully');
    }

    public function show(Team $team) 
    {
        $team->load('staffMembers.user:id,first_name,last_name');

        return Inertia::render('Staff/Teams/Show', [
            'team' => $team
        ]);
    }

        /**
     * Destroy the specified team.
     *
     * @param  Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('staff.teams.index')->with('success', 'Team deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Club;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Staff;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Club\StoreTeamRequest;
use App\Repository\Club\Team\TeamRepositoryInterface;

class TeamController extends Controller
{
    /**
     * Create a new TeamController instance.
     *
     * @param TeamRepositoryInterface $repository The team repository instance.
     */
    public function __construct(private TeamRepositoryInterface $repository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());

        return Inertia::render('Club/Teams/Index', [
            'teams' => $this->repository->index()
        ]);    
    }

    /**
     * Create a new team.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Club/Teams/Create', [
            'staff' => $this->getStaff()
        ]);    
    }

    /**
     * Store a newly created team in storage.
     *
     * @param  \App\Http\Requests\StoreTeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeamRequest $request)
    {
        $this->repository->store($request->all());

        return redirect()->route('club.teams.index')->with('success', 'Team created successfully');
    }

    /**
     * Edit a team.
     *
     * @param Team $team The team to be edited.
     * @return Response
     */
    public function edit(Team $team)
    {
        return Inertia::render('Club/Teams/Edit', [
            'staff' => $this->getStaff(),
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

        return redirect()->route('club.teams.index')->with('success', 'Team updated successfully');
    }

    public function show(Team $team) 
    {
        $team->load('staffMembers.user:id,first_name,last_name');

        return Inertia::render('Club/Teams/Show', [
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

        return redirect()->route('club.teams.index')->with('success', 'Team deleted successfully');
    }

    /**
     * Retrieves the staff information to show in multi-select.
     *
     * @return void
     */
    private function getStaff() {
        return Staff::with('user:id,first_name,last_name')->get()
        ->map(function ($staff) {
            return [
                'value' => $staff->id,
                'label' => $staff->user->first_name . ' ' . $staff->user->last_name
            ];
        });
    }
}
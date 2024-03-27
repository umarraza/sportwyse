<?php

namespace App\Http\Controllers\Club;

use Inertia\Inertia;
use App\Models\Coach;
use App\Http\Controllers\Controller;
use App\Http\Requests\Club\StoreCoachRequest;
use App\Repository\Club\Coach\CoachRepositoryInterface;

class CoachController extends Controller
{
    /**
     * Create a new CoachController instance.
     *
     * @param CoachRepositoryInterface $repository The coach repository instance.
     */
    public function __construct(private CoachRepositoryInterface $repository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Club/Coach/Index', [
            'coach' => $this->repository->index(),
            'filters' => request()->all(),
        ]);    
    }

    /**
     * Create a new coach.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Club/Coach/Create', [
            'coach' => $this->getCoach()
        ]);    
    }

    /**
     * Store a newly created coach in storage.
     *
     * @param  \App\Http\Requests\StoreCoachRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoachRequest $request)
    {
        $this->repository->store($request->all());

        return redirect()->route('club.coach.index')->with('success', 'Coach created successfully');
    }

    /**
     * Edit a coach.
     *
     * @param Coach $coach The coach to be edited.
     * @return Response
     */
    public function edit(Coach $coach)
    {
        return Inertia::render('Club/Coach/Edit', [
            'coach' => $this->getCoach(),
            'coach' => $coach,
            'currentCoach' => $this->repository->getCurrentAssignedCoach($coach)
        ]);    
    }

    /**
     * Update the specified coach in storage.
     *
     * @param  \App\Http\Requests\StoreCoachRequest  $request
     * @param  \App\Models\Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCoachRequest $request, Coach $coach)
    {
        $this->repository->update($request->all(), $coach);

        return redirect()->route('club.coach.index')->with('success', 'Coach updated successfully');
    }

    public function show(Coach $coach) 
    {
        $coach->load('coachMembers.user:id,first_name,last_name');

        return Inertia::render('Club/Coach/Show', [
            'coach' => $coach
        ]);
    }

    /**
     * Destroy the specified coach.
     *
     * @param  Coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coach $coach)
    {
        $coach->delete();

        return redirect()->route('club.coach.index')->with('success', 'Coach deleted successfully');
    }

    /**
     * Retrieves the coach information to show in multi-select.
     *
     * @return void
     */
    private function getCoach() {
        return Coach::with('user:id,first_name,last_name')->get()
        ->map(function ($coach) {
            return [
                'value' => $coach->id,
                'label' => $coach->user->first_name . ' ' . $coach->user->last_name
            ];
        });
    }
}
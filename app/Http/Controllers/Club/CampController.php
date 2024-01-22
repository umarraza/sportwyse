<?php

namespace App\Http\Controllers\Club;

use App\Models\Camp;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Http\Requests\Club\StoreCampRequest;
use App\Repository\Camp\CampRepositoryInterface;

class CampController extends Controller
{
    /**
     * CampController constructor.
     *
     * @param CampRepositoryInterface $repository The camp repository interface.
     */
    public function __construct(private CampRepositoryInterface $repository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Club/Camps/Index', [
            'camps' => $this->repository->index()
        ]);
    }

    /**
     * Create a new camp.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return Inertia::render('Club/Camps/Create', [
            'teams' => $this->repository->getTeams()
        ]);    
    }

    /**
     * Store a newly created camp in storage.
     *
     * @param  \App\Http\Requests\StoreCampRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampRequest $request) {

        $this->repository->store($request->all());

        return redirect()->route('club.camps.index')->with('success', 'Event created successfully.');
    }

    /**
     * Edit a camp.
     *
     * @param Camp $camp The camp to be edited.
     * @return Response
     */
    public function edit(Camp $camp) {

        $camp->load('teams:id,name');

        $currentTeams = $camp->teams->pluck('id')->toArray();

        return Inertia::render('Club/Camps/Edit', [
            'camp' => $camp,
            'currentTeams' => $currentTeams,
            'teams' => $this->repository->getTeams(),
        ]);    
    }

    /**
     * Update a camp.
     *
     * @param StoreCampRequest $request The request object.
     * @param Camp $camp The camp to be updated.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreCampRequest $request, Camp $camp)
    {
        $this->repository->update($request->all(), $camp);

        return redirect()->route('club.camps.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Display the specified camp.
     *
     * @param  Camp  $camp
     * @return \Illuminate\Http\Response
     */
    public function show(Camp $camp)
    {
        return Inertia::render('Club/Camps/Show', [
            'camp' => $this->repository->show($camp)
        ]);
    }

    /**
     * Destroy a camp.
     *
     * @param  Camp  $camp
     * @return void
     */
    public function destroy(Camp $camp)
    {
        $this->repository->destroy($camp);

        return redirect()->route('club.camps.index')->with('success', 'Event deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers\Club;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guardian;
use App\Repository\Player\PlayerRepositoryInterface;
use App\Repository\Stripe\StripeRepositoryInterface;
use Illuminate\Contracts\Auth\Guard;

class PlayerController extends Controller
{
    public function __construct(private PlayerRepositoryInterface $repository)
    {
    }

    public function create()
    {
        $guardians = Guardian::with('user:id,first_name,last_name')->get();

        return Inertia::render('Club/Players/Create', [
            'guardians' => $guardians,
        ]);
    }

    public function index()
    {
        return Inertia::render('Club/Players/Index', [
            'players' => $this->repository->index(),
            'filters' => request()->all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->repository->store($request->all());

        if ($request->has('redirectUrl')) {
            return redirect($request->redirectUrl)->with('success', 'Player created successfully');
        }

        return redirect()->route('club.players.index')->with('success', 'Player created successfully');
    }

    public function show(Player $player)
    {
        $player->load('user', 'transactions.camp:id,name');

        $campsOptions = app(StripeRepositoryInterface::class)->existingCamps();

        return Inertia::render('Club/Players/Show', [
            'player' => $this->repository->show($player),
            'campsOptions' => $campsOptions,
        ]);
    }

    public function teams(Player $player)
    {
        return Inertia::render('Club/Players/Teams', [
            'teams' => $this->repository->teams($player),
            'player' => $player,
        ]);
    }

    public function updateStatus(Player $player, Team $team)
    {
        $redirectUrl = request()->has('redirect_url') ? request('redirect_url') : route('club.players.teams', $player->id);

        $primaryTeam = $player->primaryTeam();

        if ($primaryTeam && request('status') === 'Primary') {

            return redirect($redirectUrl)->with('warning', 'Player is already a primary player on another team. Please remove them from that team first.');
        }

        $this->repository->updateStatus($team, $player);

        return redirect($redirectUrl)->with('success', 'Player status updated successfully');
    }
}

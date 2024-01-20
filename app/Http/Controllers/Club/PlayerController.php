<?php

namespace App\Http\Controllers\Club;

use App\Models\Team;
use Inertia\Inertia;
use App\Models\Player;
use App\Http\Controllers\Controller;
use App\Repository\Player\PlayerRepositoryInterface;

class PlayerController extends Controller
{
    public function __construct(private PlayerRepositoryInterface $repository)
    {
    }

    public function index()
    {
        return Inertia::render('Club/Players/Index', [
            'players' => $this->repository->index(),
        ]);
    }

    public function show(Player $player)
    {
        return Inertia::render('Club/Players/Show', [
            'player' => $this->repository->show($player),
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
        $this->repository->updateStatus($team, $player);

        return redirect()->route('club.players.teams', $player->id)->with('success', 'Player status updated successfully');
    }
}
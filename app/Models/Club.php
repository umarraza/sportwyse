<?php

namespace App\Models;

use App\Models\Camp;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Club extends Model
{
    /**
     * Get all of the teams for the Club
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * Get all of the players for the Club
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    /**
     * Get all of the camps for the Club
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function camps(): HasMany
    {
        return $this->hasMany(Camp::class);
    }
}
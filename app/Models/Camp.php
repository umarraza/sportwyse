<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Player;
use App\Models\CampTeam;
use App\Traits\Scopes\ClubScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Camp extends Model
{
    use ClubScope;
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    // /**
    //  * The players that belong to the Player
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  */
    // public function players(): BelongsToMany
    // {
    //     return $this->belongsToMany(Player::class);
    // }

    /**
     * The teams that belong to the Camp
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)->withPivot(['active', 'joining_date', 'leaving_date']);
    }

    /**
     * Get all of the comments for the Camp
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function players(): HasManyThrough
    {
        return $this->hasManyThrough(Player::class, CampTeam::class, 'camp_id', 'team_id', 'id', 'team_id');
    }
}
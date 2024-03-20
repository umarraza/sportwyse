<?php

namespace App\Models;

use App\Models\Staff;
use App\Models\Player;
use App\Models\TeamSetting;
use App\Traits\Scopes\ClubScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use ClubScope;
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the settings associated with the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function settings(): HasOne
    {
        return $this->hasOne(TeamSetting::class);
    }

    /**
     * The camps that belong to the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function camps(): BelongsToMany
    {
        return $this->belongsToMany(Camp::class)->withPivot(['active', 'joining_date', 'leaving_date']);
    }

    /**
     * The staffMembers that belong to the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function staffMembers(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class);
    }

    /**
     * The players that belong to the Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Player::class)->withPivot('status');
    }

    /**
     * Apply filters to the query based on the request parameters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeFilter(Builder $query) 
    {
        $query->when(request()->teamName, function ($query) {
            $query->where('name', 'like', '%' . request()->teamName . '%');
        })
        ->when(request()->status, function ($query) {
            $query->where('status', request()->status);
        })
        ->when(request()->gender, function ($query) {
            $query->where('gender', request()->gender);
        });
    }
}

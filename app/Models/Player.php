<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Guardian;
use App\Models\Transaction;
use App\Traits\Scopes\ClubScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Player extends Model
{
    use ClubScope;
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    /**
     * The camps that belong to the Player
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function camps(): BelongsToMany
    {
        return $this->belongsToMany(Camp::class);
    }

    /**
     * Get the user that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The teams that belong to the Player
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)->withPivot('status');
    }

    /**
     * Get the guardian that owns the Player
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function guardian(): BelongsTo
    {
        return $this->belongsTo(Guardian::class, 'guardian_id');
    }

    /**
     * Get all of the transactions for the Player
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Apply filters to the query based on the request parameters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeFilter(Builder $query) 
    {
        $query->join('users', 'users.id', '=', 'players.user_id')
        ->when(request()->firstName, function ($query) {
            $query->where('users.first_name', 'like', '%' . request()->firstName . '%');
        })
        ->when(request()->lastName, function ($query) {
            $query->where('users.last_name', 'like', '%' . request()->lastName . '%');
        })
        ->when(request()->gender, function ($query) {
            $query->where('players.gender', request()->gender);
        })
        ->when(request()->year, function ($query) {
            $query->whereYear('players.birth_date', request()->year);
        });
    }

    public function primaryTeam()
    {
        return $this->teams()->wherePivot('status', 'Primary')->first();
    }
}
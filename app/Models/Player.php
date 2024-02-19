<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Guardian;
use App\Traits\Scopes\ClubScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
}
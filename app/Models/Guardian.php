<?php

namespace App\Models;

use App\Models\Player;
use App\Traits\Scopes\ClubScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guardian extends Model
{
    use ClubScope;
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the players associated with the Guardian
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function players(): HasMany
    {
        return $this->hasMany(Player::class, 'guardian_id');
    }

    /**
     * Get the user that owns the Guardian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

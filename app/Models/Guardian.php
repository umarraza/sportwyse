<?php

namespace App\Models;

use App\Models\Player;
use App\Traits\Scopes\ClubScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
     * Get the player associated with the Guardian
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function player(): HasOne
    {
        return $this->hasOne(Player::class, 'guardian_id');
    }
}

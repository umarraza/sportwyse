<?php

namespace App\Traits\Scopes;

use App\Models\Club;
use App\Models\Scopes\ClubGlobalScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait ClubScope
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        parent::boot();

        static::addGlobalScope(new ClubGlobalScope());
    
        static::creating(function ($model) {
            $model->club_id = auth()->user()->club->id;
        });
    }

    /**
     * Get the club that owns the ClubScope
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }
}
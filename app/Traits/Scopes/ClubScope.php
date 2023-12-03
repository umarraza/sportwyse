<?php

namespace App\Traits\Scopes;

use App\Models\Scopes\ClubGlobalScope;

trait ClubScope
{
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new ClubGlobalScope());
    }

}
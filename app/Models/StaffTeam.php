<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class StaffTeam extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['staff_id', 'team_id'];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchFilter extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'search_filters';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}

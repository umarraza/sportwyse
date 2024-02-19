<?php

namespace App\Models;

use App\Models\Player;
use App\Models\TempTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    /**
     * Get the camp that owns the SearchFilter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function camp(): BelongsTo
    {
        return $this->belongsTo(Camp::class);
    }

    /**
     * Get the player that owns the SearchFilter
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function run()
    {
        $models = TempTransaction::query()
            ->failed()
            ->where('event_name', $this->event_name)
            ->where('description', $this->player_name)
            ->where(function($q) {
                $q->whereDate('created_date', '>=', $this->from_date)
                    ->whereDate('created_date', '<=', $this->to_date);
            })
            ->where(function($q) {
                $q->where('amount', '>=', $this->from_amount)
                    ->where('amount', '<=', $this->to_amount);
            })
            ->get();

        foreach ($models as $model) {
            foreach ($models as $model) {
                $model->update([
                    'camp_id' => $this->camp_id,
                    'player_id' => $this->player_id,
                ]);
            }
        }
    }
}

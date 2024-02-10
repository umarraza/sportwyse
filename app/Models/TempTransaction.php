<?php

namespace App\Models;

use App\Models\Camp;
use App\Models\Player;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class TempTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'camp_id',
        'player_id',
        'customer_email',
        'description',
        'event_name',
        'created_date',
        'customer_id',
        'status',
        'invoice_number',
        'amount',
        'currency',
        'fee',
        'is_link',
        'mode',
        'payment_intent_id',
        'statement_descriptor',
        'customer_description',
        'customer_phone',
        'application_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['status_lebel', 'date_label'];

    public function getDateLabelAttribute()
    {
        return Carbon::parse($this->created_date)->format('m-d-Y');
    }

    /**
     * Get the status label attribute.
     *
     * @return string
     */
    public function getStatusLebelAttribute()
    {
        switch ($this->status) {
            case 'Paid':
                return "<span class='badge badge-success'>Paid</span>";
                break;
            case 'Failed':
                return "<span class='badge badge-danger'>Failed</span>";
                break;
            case 'canceled':
                return "<span class='badge badge-warning'>Canceled</span>";
                break;
            case 'Refunded':
                return "<span class='badge badge-info'>Refunded</span>";
                break;
        }
    }

    /**
     * Get the player that owns the TempTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class)->withDefault();
    }

    /**
     * Get the camp that owns the TempTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function camp(): BelongsTo
    {
        return $this->belongsTo(Camp::class)->withDefault();
    }

    /**
     * Apply search filters to the query.
     *
     * @param Builder $query The query builder instance.
     * @return void
     */
    public function scopeSearch(Builder $query): void
    {
        $eventModel = TempTransaction::find(request()->eventId);
        $playerModel = TempTransaction::find(request()->playerId);

        $query->when(isset($eventModel), function ($q) use ($eventModel) {
            $q->where('event_name', $eventModel->event_name);
        })
        ->when(isset($playerModel), function ($q) use ($playerModel) {
            $q->where('description', $playerModel->description);
        })
        ->when(request()->newPlayerId, function ($q) {
            $q->where('player_id', request()->newPlayerId);
        })
        ->when(request()->newEventId, function ($q) {
            $q->where('camp_id', request()->newEventId);
        })
        ->when(request()->fromDate && request()->toDate, function ($q) {
            $q->whereDate('created_date', '>=', request()->date('fromDate'))
                ->whereDate('created_date', '<=', request()->date('toDate'));
        })
        ->when(request()->fromDate && !request()->toDate, function ($q) {
            $q->whereDate('created_date', '>=', request()->date('fromDate'));
        })
        ->when(!request()->fromDate && request()->toDate, function ($q) {
            $q->whereDate('created_date', '<=', request()->date('toDate'));
        })
        ->when(request()->fromAmount && request()->toAmount, function ($q) {
            $q->where('amount', '>=', request()->fromAmount)
                ->where('amount', '<=', request()->toAmount);
        })
        ->when(request()->fromAmount && !request()->toAmount, function ($q) {
            $q->where('amount', '>=', request()->fromAmount);
        })
        ->when(!request()->fromAmount && request()->toAmount, function ($q) {
            $q->where('amount', '<=', request()->toAmount);
        })
        ->when(request()->boolean('allUnAssigned'), function ($q) {
            $q->whereNull('player_id')->whereNull('camp_id');
        })
        ->when(request()->boolean('unAssignedByEvent'), function ($q) {
            $q->whereNull('camp_id');
        })
        ->when(request()->boolean('unAssignedByPlayer'), function ($q) {
            $q->whereNull('player_id');
        })
        ->when(request()->boolean('allAssigned'), function ($q) {
            $q->whereNotNull('player_id')->whereNotNull('camp_id');
        })
        ->when(request()->boolean('assignedByEvent'), function ($q) {
            $q->whereNotNull('camp_id');
        })
        ->when(request()->boolean('assignedByPlayer'), function ($q) {
            $q->whereNotNull('player_id');
        })
        ->when(request()->status, function ($q) {
            $q->where('status', request()->status);
        })
        ->when(!request()->status, function ($q) {
            $q->failed();
        });
    }

    /**
     * Scope a query to only include failed transactions.
     */
    public function scopeFailed(Builder $query)
    {
        $query->where('status', 'Failed');
    }

    public function scopeUnassigned($query)
    {
        return $query->whereNull('camp_id')->whereNull('player_id');
    }

    public function scopeAssigned($query)
    {
        return $query->whereNotNull('camp_id')->whereNotNull('player_id');
    }

    public function scopeAssignedByEvent($query)
    {
        return $query->whereNotNull('camp_id');
    }

    public function scopeUnAssignedByEvent($query)
    {
        return $query->whereNull('camp_id');
    }

    public function scopeAssignedByPlayer($query)
    {
        return $query->whereNotNull('player_id');
    }

    public function scopeUnAssignedByPlayer($query)
    {
        return $query->whereNull('player_id');
    }
}

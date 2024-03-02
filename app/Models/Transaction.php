<?php

namespace App\Models;

use App\Models\Camp;
use App\Models\Player;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
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
        'payment_type',
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

    public function scopeSearch(Builder $query)
    {
        $query->when(request()->camp_id, function ($query) {
            $query->where('camp_id', request()->camp_id);
        })
        ->when(request()->player_id, function ($query) {
            $query->where('player_id', request()->player_id);
        })
        ->when(request()->email, function ($query) {
            $query->where('customer_email', 'like', "%{request()->email}%");
        })
        ->when(request()->customer_description, function ($query) {
            $query->where('customer_description', 'like', '%'.request()->customer_description.'%');
        })
        ->when(request()->status, function ($query) {
            $query->where('status', request()->status);
        })
        ->when(request()->customer_id, function ($query) {
            $query->where('customer_id', request()->customer_id);
        })
        ->when(request()->event_name, function ($query) {
            $query->where('event_name', 'like', '%'.request()->event_name.'%');
        })
        ->when(request()->boolean('allUnAssigned'), function ($query) {
            $query->whereNull('player_id')->whereNull('camp_id');
        })
        ->when(request()->boolean('unAssignedByEvent'), function ($query) {
            $query->whereNull('camp_id');
        })
        ->when(request()->boolean('unAssignedByPlayer'), function ($query) {
            $query->whereNull('player_id');
        })
        ->when(request()->boolean('allAssigned'), function ($query) {
            $query->whereNotNull('player_id')->whereNotNull('camp_id');
        })
        ->when(request()->boolean('assignedByEvent'), function ($query) {
            $query->whereNotNull('camp_id');
        })
        ->when(request()->boolean('assignedByPlayer'), function ($query) {
            $query->whereNotNull('player_id');
        });
    }
}
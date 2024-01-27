<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
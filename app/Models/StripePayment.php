<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StripePayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'payer_email',
        'amount',
        'currency',
        'payment_status',
        'order_ids',
    ];

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'credit_card_number',
        'cvc_number',
        'expire_date',
        'country',
        'city',
        'state',
        'zip_code',
    ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
}

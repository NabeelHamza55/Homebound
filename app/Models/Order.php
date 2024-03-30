<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'user_name',
        'book_title',
        'unit_price',
        'total_price',
        'status',
        'user_id',
    ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
}

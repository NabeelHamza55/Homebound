<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_title',
        'book_price',
        'front_page',
        'spine_page',
        'back_page',
        'inner_pages',
        'book_id',
        'order_id',
    ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
}

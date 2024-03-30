<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'front_page',
        'spine_page',
        'back_page',
        'inner_pages',
        'unit_price',
    ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
}

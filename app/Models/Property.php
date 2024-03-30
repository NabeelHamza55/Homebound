<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'property';
    protected $fillable = [
        'price',
        'year_building',
        'home_type',
        'facts',
        'address',
        'description',
        'images',
    ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'picture',
        'category',
        'name',
        'description',
        'price'
    ];
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}

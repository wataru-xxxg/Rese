<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'user_id',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}

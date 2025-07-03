<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'description',
        'image_path',
        'owner_id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * 店舗のオーナーを取得
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * 店舗の予約を取得
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function getAverageRatingAttribute()
    {
        $average = $this->reviews()->avg('rating');
        return $average ? round($average, 1) : 0;
    }

    public function getReviewCountAttribute()
    {
        return $this->reviews()->count();
    }
}

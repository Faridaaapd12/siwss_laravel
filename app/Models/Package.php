<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table = 'packages';
    // protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $appends = [
        'thumbnail'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function usersWhoWishlisted()
    {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    public function usersCart()
    {
        return $this->belongsToMany(User::class, 'carts');
    }

    public function images()
    {
        return $this->hasMany(PackageImage::class, 'package_id', 'id');
    }

    public function getThumbnailAttribute()
    {
        return $this->images()->where('thumbnail', 1)->first()->image_url;
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}

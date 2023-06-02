<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function guardedAdd($userId, $packageId)
    {
        $notWishlisted = $this
            ->where('user_id', $userId)
            ->where('package_id', $packageId)
            ->get()
            ->isEmpty();

        if ($notWishlisted) {
            $this->user_id = $userId;
            $this->package_id = $packageId;
            $this->save();
        }
    }

    public function wishData()
    {
        return $this::all()
            ->map(function ($wishlist, $index) {
                $wishlistId = $wishlist->id;

                $thumbnail = asset($wishlist
                    ->package
                    ->images
                    ->where('thumbnail', 1)
                    ->first()
                    ->image_url);

                $packageId = $wishlist
                    ->package_id;

                $packageName = $wishlist
                    ->package
                    ->package_name;

                $description = $wishlist
                    ->package
                    ->description;

                $price = $wishlist
                    ->package
                    ->price;

                $averageRating = $wishlist
                    ->package
                    ->comments
                    ->whenNotEmpty(function ($comments) {
                        return $comments->avg('rating');
                    }, function ($comments) {
                        return 0;
                    });

                $ratingCount = $wishlist
                    ->package
                    ->comments
                    ->count();

                return [
                    'id' => $wishlistId,
                    'thumbnail' => $thumbnail,
                    'package_id' => $packageId,
                    'package_name' => $packageName,
                    'description' => $description,
                    'price' => $price,
                    'rating' => $averageRating,
                    'count' => $ratingCount
                ];
            })
            ->all();
    }
}

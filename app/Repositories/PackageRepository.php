<?php

namespace App\Repositories;

use App\Models\Package;

class PackageRepository
{
    private function packageListInternal($load)
    {
        $limit = $load * 6;

        $loggedIdUser = !empty(auth()->user()) ? auth()->user()->id : false;

        return Package::limit($limit)
            ->get()
            ->map(function ($package, $key) use ($loggedIdUser) {
                $rating = $package
                    ->comments
                    ->whenEmpty(function ($c) {
                        return 0;
                    }, function ($c) {
                        return $c->avg('rating');
                    });

                $count = $package
                    ->comments
                    ->count();

                $image = $package
                    ->images
                    ->where('thumbnail', 1)
                    ->first()
                    ->image_url;

                if ($loggedIdUser) {
                    $wishlisted = $package
                        ->usersWhoWishlisted
                        ->filter(function ($value, $key) use ($loggedIdUser) {
                            return $value->id == $loggedIdUser;
                        })
                        ->isNotEmpty();

                    $wishlistId = $package
                        ->wishlists
                        ->where('user_id', $loggedIdUser)
                        ->where('package_id', $package->id)
                        ->whenNotEmpty(function ($wishlist) {
                            return $wishlist->first()->id;
                        }, function ($wishlist) {
                            return 0;
                        });

                    return [
                        "id" => $package->id,
                        "package_name" => $package->package_name,
                        "price" => $package->price,
                        "image" => $image,
                        "wishlisted" => $wishlisted,
                        "wishlistId" => $wishlistId,
                        "createdAt" => $package->created_at,
                        "updatedAt" => $package->updated_at,
                        "rating" => $rating,
                        "description" => $package->description,
                        "ratingCount" => $count,
                    ];
                } else {
                    return [
                        "id" => $package->id,
                        "package_name" => $package->package_name,
                        "price" => $package->price,
                        "image" => $image,
                        "wislisted" => false,
                        "wishlistId" => 0,
                        "createdAt" => $package->created_at,
                        "updatedAt" => $package->updated_at,
                        "rating" => $rating,
                        "description" => $package->description,
                        "ratingCount" => $count,
                    ];
                }
            });
    }

    private function packageSortedAll($load)
    {
        return $this->packageListInternal($load)->all();
    }

    private function packageSortedPopular($load)
    {
        return $this->packageListInternal($load)->sortByDesc("rating")->all();
    }

    private function packageSortedLatest($load)
    {
        if ($this->packageListInternal($load)->isEmpty()) {
            return $this->packageSortedAll($load);
        }

        foreach ($this->packageSortedAll($load) as $value) {
            if (empty($value["createdAt"])) {
                return $this->packageSortedAll($load);
            }
        }

        return $this->packageListInternal($load)->sortByDesc("createdAt")->all();
    }

    public function packageListWithAverageRating($load, $sort)
    {
        if ($sort == "all") {
            return $this->packageSortedAll($load);
        } else if ($sort == "latest") {
            return $this->packageSortedLatest($load);
        } else if ($sort == "popular") {
            return $this->packageSortedPopular($load);
        } else {
            return $this->packageSortedAll($load);
        }
    }

    public function packageDetail($id)
    {
        return collect([Package::find($id)])
            ->map(function ($package, $key) {
                $avgRating = $package
                    ->comments
                    ->whenNotEmpty(
                        fn ($c) => $c->avg('rating'),
                        fn ($c) => 0
                    );

                $ratingCount = $package
                    ->comments
                    ->count();

                $ratingGroup = $package
                    ->comments
                    ->reduce(function ($carry, $comment) {
                        return [
                            "5" => $comment->rating == 5 ? $carry["5"] + 1 : $carry["5"],
                            "4" => $comment->rating == 4 ? $carry["4"] + 1 : $carry["4"],
                            "3" => $comment->rating == 3 ? $carry["3"] + 1 : $carry["3"],
                            "2" => $comment->rating == 2 ? $carry["2"] + 1 : $carry["2"],
                            "1" => $comment->rating == 1 ? $carry["1"] + 1 : $carry["1"],
                        ];
                    }, [
                        "5" => 0,
                        "4" => 0,
                        "3" => 0,
                        "2" => 0,
                        "1" => 0
                    ]);

                $ratingPercentage = $ratingCount != 0 ? [
                    "5" => intval(round(($ratingGroup["5"] / $ratingCount) * 100.0)),
                    "4" => intval(round(($ratingGroup["4"] / $ratingCount) * 100.0)),
                    "3" => intval(round(($ratingGroup["3"] / $ratingCount) * 100.0)),
                    "2" => intval(round(($ratingGroup["2"] / $ratingCount) * 100.0)),
                    "1" => intval(round(($ratingGroup["1"] / $ratingCount) * 100.0))
                ] : [
                    "5" => 0,
                    "4" => 0,
                    "3" => 0,
                    "2" => 0,
                    "1" => 0
                ];


                $commentWithInfo = $package
                    ->comments
                    ->whenNotEmpty(function ($c) {
                        return $c->map(function ($comment, $key) {
                            return [
                                "star" => $comment->rating,
                                "text" => $comment->content,
                                "author" => $comment->user->name,
                                "time" => (!empty($comment->updated_at)) ? $comment->updated_at->toFormattedDateString() : "",
                            ];
                        });
                    });


                $heroImage = asset($package
                    ->images
                    ->where('thumbnail', 1)
                    ->first()
                    ->image_url);

                $packageImages = $package
                    ->images
                    ->map(function ($packageImage, $key) {
                        return asset($packageImage->image_url);
                    })->all();

                return [
                    "id" => $package->id,
                    "price" => $package->price,
                    "maxpeople" => $package->maxpeople,
                    "description" => $package->description,
                    "averageRating" => $avgRating,
                    "ratingCount" => $ratingCount,
                    "ratingPercentage" => $ratingPercentage,
                    "commentWithInfo" => $commentWithInfo,
                    "heroImage" => $heroImage,
                    "packageImages" => $packageImages,
                ];
            })
            ->first();
    }
}

<?php

namespace App\Repositories;

use App\Models\Package;

class SearchRepository
{
    private function averageRating(Package $package)
    {
        return $package
            ->comments
            ->whenEmpty(function ($c) {
                return 0;
            }, function ($c) {
                return $c->avg('rating');
            });
    }

    private function commentCount(Package $package)
    {
        return $package
            ->comments
            ->count();
    }

    private function packageThumbnail(Package $package)
    {
        return asset($package
            ->images
            ->where('thumbnail', 1)
            ->first()
            ->image_url);
    }

    private function wishlistData(Package $package)
    {
        $loggedIdUser = !empty(auth()->user()) ? auth()->user()->id : false;

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
            "wishlisted" => $wishlisted,
            "wishlistId" => $wishlistId,
        ];
    }

    private function homeSearchInternal($detail)
    {
        $packages = Package::query();

        if (!empty($detail['package_name']) && !empty($detail['maxpeople'])) {
            $packages
                ->where('package_name', $detail['package_name'])
                ->where('maxpeople', '<=', $detail['maxpeople']);
        } else {
            $packages
                ->where('package_name', $detail['package_name'])
                ->orWhere('maxpeople', '<=', $detail['maxpeople']);
        }

        return $packages
            ->get()
            ->map(function ($package, $key) use (&$detail) {
                $rating = $this->averageRating($package);

                $count = $this->commentCount($package);

                $image = $this->packageThumbnail($package);

                $wishlistData = $this->wishlistData($package);

                return [
                    "id" => $package->id,
                    "package_name" => $package->package_name,
                    "price" => $package->price,
                    "wishlisted" => $wishlistData["wishlisted"],
                    "wishlistId" => $wishlistData["wishlistId"],
                    "image" => $image,
                    "rating" => $rating,
                    "description" => $package->description,
                    "ratingCount" => $count,
                    "createdAt" => $package->created_at,
                    "updatedAt" => $package->updated_at,
                    "prevHomeSearch" => [
                        "package_name" => $detail["package_name"],
                        "maxpeople" => $detail["maxpeople"],
                        "sort" => $detail["sort"]
                    ],
                ];
            });
    }

    private function homeSearchAll($detail)
    {
        return $this->homeSearchInternal($detail)->all();
    }

    private function homeSearchPopular($detail)
    {
        return $this->homeSearchInternal($detail)->sortByDesc('rating')->all();
    }

    private function homeSearchLatest($detail)
    {
        foreach ($this->homeSearchInternal($detail) as $value) {
            if (empty($value["createdAt"])) {
                return $this->homeSearchInternal($detail)->all();
            }
        }

        return $this->homeSearchInternal($detail)->sortByDesc('createdAt')->all();
    }

    private function packagesSearchInternal($detail)
    {
        $packages = Package::query();
        $detailFilled = (!empty($detail['package_name'])
            && !empty($detail['location'])
            && !empty($detail['maxpeople']));

        if ($detailFilled) {
            $packages
                ->where('package_name', $detail['package_name'])
                ->where('location', $detail['location'])
                ->where('maxpeople', '<=', $detail['maxpeople']);
        } else {
            $packages
                ->where('package_name', $detail['package_name'])
                ->orWhere('location', $detail['location'])
                ->orWhere('maxpeople', '<=', $detail['maxpeople']);
        }

        return $packages
            ->get()
            ->map(function ($package, $key) use (&$detail) {
                $rating = $this->averageRating($package);

                $count = $this->commentCount($package);

                $image = $this->packageThumbnail($package);

                $wishlistData = $this->wishlistData($package);

                return [
                    "id" => $package->id,
                    "package_name" => $package->package_name,
                    "price" => $package->price,
                    "wishlisted" => $wishlistData['wishlisted'],
                    "wishlistId" => $wishlistData['wishlistId'],
                    "image" => $image,
                    "rating" => $rating,
                    "description" => $package->description,
                    "ratingCount" => $count,
                    "createdAt" => $package->created_at,
                    "updatedAt" => $package->updated_at,
                    "prevpackagesSearch" => [
                        "package_name" => $detail["package_name"],
                        "location" => $detail["location"],
                        "maxpeople" => $detail["maxpeople"],
                        "sort" => $detail["sort"]
                    ],
                ];
            });
    }

    private function packagesSearchAll($detail)
    {
        return $this->packagesSearchInternal($detail)->all();
    }

    private function packagesSearchLatest($detail)
    {
        foreach ($this->packagesSearchInternal($detail) as $value) {
            if (empty($value["createdAt"])) {
                return $this->packagesSearchInternal($detail)->all();
            }
        }

        return $this->packagesSearchInternal($detail)->sortByDesc("createdAt")->all();
    }

    private function packagesSearchPopular($detail)
    {
        return $this->packagesSearchInternal($detail)->sortByDesc("rating")->all();
    }

    /*
    * $detail: [
    *       'package_name' => string,
    *       'maxpeople' => string | int
    *       'sort' => string
    * ]
    */
    public function homeSearch($detail)
    {
        if ($detail["sort"] == "all") {
            return $this->homeSearchAll($detail);
        } else if ($detail["sort"] == "popular") {
            return $this->homeSearchPopular($detail);
        } else if ($detail["sort"] == "latest") {
            return $this->homeSearchLatest($detail);
        } else {
            return $this->homeSearchAll($detail);
        }
    }

    /*
    * $detail: [
    *       'package_name' => string,
    *       'location' => string,
    *       'maxpeople' => string | int,
    *       'sort' => string
    * ]
    */
    public function packagesSearch($detail)
    {
        if ($detail["sort"] == "all") {
            return $this->packagesSearchAll($detail);
        } else if ($detail["sort"] == "popular") {
            return $this->packagesSearchPopular($detail);
        } else if ($detail["sort"] == "latest") {
            return $this->packagesSearchLatest($detail);
        } else {
            return $this->packagesSearchAll($detail);
        }
    }
}

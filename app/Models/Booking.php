<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');
    }

    public function cartData($userId)
    {
        if (empty($userId)) {
            return [
                "carts" => [],
                "from" => "",
                "to" => "",
                "total_price" => 0,
                "total_guest" => 0
            ];
        }

        return $this::where('user_id', $userId)
            ->get()
            ->map(function ($item, $key) {
                $cartId = $item->id;

                $packageImageIcon = asset($item
                    ->package
                    ->images
                    ->where('thumbnail', 1)
                    ->first()
                    ->image_url);

                $packageName = $item
                    ->package
                    ->package_name;

                $packagePrice = $item
                    ->package
                    ->price;

                $guest = $item
                    ->attendant;

                $bookingDateStart = new Carbon($item
                    ->booking_day_start);

                $bookingDateEnd = new Carbon($item
                    ->booking_day_end);

                // $diff = intval($bookingDateEnd->floatDiffInDays($bookingDateStart));

                return [
                    'id' => $cartId,
                    'package_name' => $packageName,
                    'image_icon' => $packageImageIcon,
                    'date_start' => new Carbon($bookingDateStart),
                    'date_end' => new Carbon($bookingDateEnd),
                    'price' => $packagePrice,
                    'guest' => $guest
                ];
            })
            ->whenNotEmpty(function ($collection) {
                $carts = $collection
                    ->map(function ($item, $key) {
                        return [
                            'id' => $item['id'],
                            'package_name' => $item['package_name'],
                            'image_icon' => $item['image_icon'],
                            'price' => $item['price']
                        ];
                    })
                    ->all();

                $from = $collection
                    ->map(function ($item, $key) {
                        return $item['date_start'];
                    })
                    ->sort()
                    ->first()
                    ->locale('in-ID')
                    ->format('l, j M Y');

                $to = $collection
                    ->map(function ($item, $key) {
                        return $item['date_end'];
                    })
                    ->sortDesc()
                    ->first()
                    ->format('l, j M Y');

                return [
                    'carts' => $carts,
                    'from' => $from,
                    'to' => $to,
                    'total_price' => $collection->sum('price'),
                    'total_guest' => $collection->sum('guest')
                ];
            }, function ($collection) {
                return [
                    "carts" => [],
                    "from" => "",
                    "to" => "",
                    "total_price" => 0,
                    "total_guest" => 0
                ];
            });
    }
}

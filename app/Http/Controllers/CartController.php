<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\Midtrans\CreateSnapTokenService; 
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCart1()
    {
        
        $userId = (!empty(auth()->user())) ? auth()->user()->id : null;
        $cart = new Cart();
        $cartData = $cart->cartData($userId);
        
        $midtrans = new CreateSnapTokenService($cartData['total_price']);
        $snapToken = $midtrans->getSnapToken();

        

        if ($cart->cartData($userId)["total_price"] == 0) {
            session()->flash('isAbleToCheckOut', "no");
        } else {
            session()->flash('isAbleToCheckOut', "yes");
        }
        // dd($snapToken);
        return view('cart1', [
            'carts' => $cart->cartData($userId),
            'snapToken' => $snapToken
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addToCart(Request $request)
    {
        $id = $request->input('id');
        $textDates = $request->input('dates');
        $from = $request->input('from');
        $to = $request->input('to');
        $guest = intval($request->input('guest'));

        $startDay = new Carbon(explode(" > ", $textDates)[0]);
        // $endDay = new Carbon(explode(" > ", $textDates)[1]);
        $startTime = new Carbon($from);
        $endTime = new Carbon($to);

        $cart = new Cart();
        $cart->package_id = $id;
        $cart->user_id = auth()->user()->id;
        $cart->booking_day_start = $startDay;
        $cart->booking_day_end = null;
        $cart->booking_time_start = $startTime;
        $cart->booking_time_end = $endTime;
        $cart->attendant = $guest;
        $cart->save();

        return redirect("/cart1");
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

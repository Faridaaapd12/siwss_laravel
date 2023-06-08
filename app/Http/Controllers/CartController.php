<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
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
        // dd($cartData);
        if ($cartData['total_price'] <= 0) {
            return redirect('/')->withErrors('cart masih error');
        }
        $midtrans = new CreateSnapTokenService($cartData['total_price']);
        $snapToken = $midtrans->getSnapToken();



        if ($cart->cartData($userId)["total_price"] == 0) {
            session()->flash('isAbleToCheckOut', "no");
        } else {
            session()->flash('isAbleToCheckOut', "yes");
        }
        // dd($cart->cartData($userId));
        return view('cart1', [
            'carts' => $cart->cartData($userId),
            'snapToken' => $snapToken,
            'userId' => $userId
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


    public function deleteCartItem(Request $request, $id)
    {
        $cart = Cart::find(intval($id));

        $cart->delete();

        return redirect('/cart1');
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



    private function getTotalCart($userId)
    {

        $cart = new Cart();
        $cartData = $cart->cartData($userId);

        return  $cart->cartData($userId);
    }

    public function apiTransaction(Request $request, $userId)
    {
        try {
            // $userId = (!empty(auth()->user())) ? auth()->user()->id : null;
            // dd($userId)
            //mindahin cart ke booking
            // $cart = $this->getTotalCart($userId);


            // dd($request['order_id']);
            $bank = $request['va_numbers'][0]['bank'] ?? null;
            $va = $request['va_numbers'][0]['va_number'] ?? null;


            Transaction::create([
                'order_id' => $request['order_id'],
                'pemesanan_id' => '12323',
                'status_code' => $request['status_code'],
                'status_message' => $request['status_message'],
                'transaction_id' => $request['transaction_id'],
                'gross_amount' => $request['gross_amount'],
                'payment_type' => $request['payment_type'],
                'transaction_time' => $request['transaction_time'],
                'transaction_status' => $request['transaction_status'],
                'bank' => $bank ?? null,
                'va_number' => $va ?? null,
                'fraud_status' => $request['fraud_status'] ?? null,
                'bca_va_number' => $request['bca_va_number'] ?? null,
                'permata_va_number' => $request['permata_va_number'] ?? null,
                'pdf_url' => $request['pdf_url'] ?? null,
                'finish_redirect_url' => $request['finish_redirect_url'] ?? null,
                'bill_key' => $request['bill_key'] ?? null,
                'biller_code' => $request['biller_code'] ?? null,
            ]);

            $order = new Order();
            $order->payment_order_id = $request['order_id'];
            $order->status = $request['status_message'];
            $order->user_id = $userId;

            $order->save();
            $order->refresh();

            $cart = Cart::where('user_id', '=', $userId)->get();
            // dd($cart);
            foreach ($cart as $data) {
                $booking = new Booking();
                $booking->booking_day_start = $data->booking_day_start;
                $booking->booking_day_end = $data->booking_day_end;
                $booking->booking_time_start = $data->booking_time_start;
                $booking->booking_time_end = $data->booking_time_end;
                $booking->attendant = $data->attendant;
                $booking->package_id = $data->package_id;
                $booking->order_id = $order->id;
                $booking->save();
            }

            Cart::where('user_id', '=', $userId)->delete();

            return response()->json([
                'message' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 400,
                'message' => $e->getMessage()
            ]);
        }
        // dd($response);


        // $userId = (!empty(auth()->user())) ? auth()->user()->id : null;
        // $cart = new Cart();
        // $cartData = $cart->cartData($userId);

        // $midtrans = new CreateSnapTokenService($cartData['total_price']);
        // $snapToken = $midtrans->getSnapToken();

        // return response()->json([
        //     'snapToken' => $snapToken,
        //     'carts' => $cart->cartData($userId),
        //     'totalPrice' => $cartData['total_price']
        // ]);
    }
}

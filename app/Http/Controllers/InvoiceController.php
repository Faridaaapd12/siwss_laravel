<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session()->reflash();
        $invoice = Cart::where('user_id', auth()->user()->id)
            ->get()
            ->map(function ($cart, $key) {
                $dateStart = new Carbon($cart->booking_day_start);
                $dateEnd = new Carbon($cart->booking_day_end);

                $diff = intval($dateEnd->floatDiffInDays($dateStart));

                $timeStart = new Carbon($cart->booking_time_start);
                $timeEnd = new Carbon($cart->booking_time_end);
                
                return [
                    'booking_start' => $dateStart->format('l, j F'),
                    'booking_end' => $dateEnd->format('l, j F'),
                    'time_start' => $timeStart->format('H:i'),
                    'time_end' => $timeEnd->format('H:i'),
                    'attendant' => $cart->attendant,
                    'package_name' => $cart->package->package_name,
                    'price' => $cart->package->price * $diff
                ];
            })
            ->pipe(function ($invoiceCollection) {
                $orderDate = Carbon::now()->format('l, j F');
                $paymentId = uniqid();
                $totalPay = $invoiceCollection->sum('price');
                
                return [
                    'invoice_table' => $invoiceCollection->all(),
                    'order_date' => $orderDate,
                    'payment_id' => $paymentId,
                    'total_pay' => $totalPay
                ];
            });
        // dd($invoice);
        session()->flash('payment_id', $invoice['payment_id']);
        return view('invoice', ['invoiceData' => $invoice]);
    }

    public function checkout()
    {
        # code...
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

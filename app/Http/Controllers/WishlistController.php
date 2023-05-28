<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;


class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $wishlist = new Wishlist();

        return view('wishlist');
    }

    public function add(Request $request)
    {
        $roomId = $request->input('package_id');
        $wishlist = new Wishlist();
        $wishlist->guardedAdd(
            auth()->user()->id, 
            $roomId);

        // if(url()->previous() != url('/wishlist')) {
        //     if($request->session()->has($this->roomSession)) {
        //         $prevSearch = $request->session()->get($this->roomSession)[0]["prevRoomsSearch"];

        //         session()->forget($this->roomSession);

        //         $roomSearch = $this->searchRepo->roomsSearch($prevSearch);

        //         session()->flash($this->roomSession, $roomSearch);
        //     }

        //     if($request->session()->has($this->homeSession)) {
        //         $prevSearch = $request->session()->get($this->homeSession)[0]["prevHomeSearch"];
        //         session()->forget($this->homeSession);
        //         $homeSearch = $this->searchRepo->homeSearch($prevSearch);
                
        //         session()->flash($this->homeSession, $homeSearch);
        //     }
        // }


        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $wishlistId = intval($request->input('wishlist_id'));
        $wishlist = Wishlist::find($wishlistId);
        $wishlist->delete();

        // if(url()->previous() != url('/wishlist')) {
        //     if($request->session()->has($this->roomSession)) {
        //         $prevSearch = $request->session()->get($this->roomSession)[0]["prevRoomsSearch"];

        //         session()->forget($this->roomSession);

        //         $roomSearch = $this->searchRepo->roomsSearch($prevSearch);

        //         session()->flash($this->roomSession, $roomSearch);
        //     }

        //     if($request->session()->has($this->homeSession)) {
        //         $prevSearch = $request->session()->get($this->homeSession)[0]["prevHomeSearch"];
        //         session()->forget($this->homeSession);
        //         $homeSearch = $this->searchRepo->homeSearch($prevSearch);
                
        //         session()->flash($this->homeSession, $homeSearch);
        //     }
        // }

        return redirect()->back();
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

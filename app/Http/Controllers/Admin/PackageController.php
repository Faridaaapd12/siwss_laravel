<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function listing(Request $request)
    {
        $roomListingPerPage = 10;
        

        $page = $request->query('page');
        $currentPage = !empty($page) ? intval($page) : 1;
        $package = Package::all();
        // $package[0]->images
        $image = array();
       foreach ($package as &$row) {
        $row->image = DB::table('packages')
        ->join('package_images','packages.id','=','package_images.package_id')
        ->select('package_images.image_url')
        ->where('package_images.package_id',$row->id)
        ->first()->image_url;
       }
    //    dd($package);
       

            // $image = asset(
            //     $room
            //     ->images
            //     ->where('thumbnail', 1)
            //     ->first()
            //     ->image_url);
        //     // dd($image);
            // return [
            //     "id" => $room->id,
            //     "image" => $image,
            //     "package_name" => $room->package_name,
            //     "description" => $room->description,
            // ];
        // })->chunk($roomListingPerPage);
        // dd($chunkedRoom[0][0]["image"]);
        // dd($package);


        return view('admin.listings', [
            'rooms' => $package, 
            'totalPage' => $package->count(),
            'currentPage' => $currentPage
        ]);
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PackageImage;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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


    public function viewlisting($id)
    {
        $package = Package::find($id);
        // dd($package);

        return view('admin.viewlisting', ['package' => $package]);
    }

    public function listing(Request $request)
    {
        $roomListingPerPage = 10;


        $page = $request->query('page');
        $currentPage = !empty($page) ? intval($page) : 1;
        $package = Package::all();
        // dd($package[0]->id);

        // $package[0]->images
        $image = array();
        // foreach ($package as &$row) {
        //     $row->image = DB::table('packages')
        //         ->join('package_images', 'packages.id', '=', 'package_images.package_id')
        //         ->select('package_images.image_url')
        //         ->where('package_images.package_id', $row->id)
        //         ->where('package_images.thumbnail', 1)
        //         ->first()->image_url;
        // }
        // dd($package[0]->thumbnail);


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
            'packages' => $package,
            'totalPage' => $package->count(),
            'currentPage' => $currentPage
        ]);
    }

    public function createForm()
    {
        return view('admin.addlisting');
    }

    public function create(Request $r)
    {
        $this->validate($r, [
            // 'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'maxpeople' => 'required',
            'price' => 'required',
            'thumbnail' => 'image|mimes:jpg,jpeg,png|max:2048',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);
        try {
            $id = uniqid();
            $package = new Package();
            $package->id = $id;
            $package->package_name = $r->input('name');
            $package->description = $r->input('description');
            $package->location = $r->input('location');
            $package->price = $r->input('price');
            $package->maxpeople = $r->input('maxpeople');
            $package->save();
            $package->fresh();
            if ($package->count() > 0) {
                // dd($r->file('thumbnail'));
                if ($r->hasFile('thumbnail')) {

                    $thumbnailFile = $r->file('thumbnail');
                    $thumbnailSlash = 'images/thumbnails/';
                    $thumbnailName = uniqid() . '-' . $thumbnailFile->getClientOriginalName();
                    $thumbnailFile->move(public_path('images/thumbnails/'), $thumbnailName);
                    $thumbnailName = $thumbnailSlash . $thumbnailName;

                    $thumbnailUpload = new PackageImage();
                    $thumbnailUpload->package_id = $id;
                    $thumbnailUpload->thumbnail = 1;
                    $thumbnailUpload->image_url = $thumbnailName;
                    $thumbnailUpload->save();
                }
                if ($r->hasFile('photos')) {
                    foreach ($r->file('photos') as $photo) {
                        $photoSlash = 'images/photos/';
                        $photoName = uniqid() . '-' .  $photo->getClientOriginalName();
                        $photo->move(public_path('images/photos/'), $photoName);
                        $photoName = $photoSlash . $photoName;

                        $photoUpload = new PackageImage();
                        $photoUpload->package_id = $id;
                        $photoUpload->thumbnail = 0;
                        $photoUpload->image_url = $photoName;
                        $photoUpload->save();
                    }
                }
            }




            // return response('ok');
            return redirect()->route('admin.listings')->withSuccess('berhasil menambahkan package');
        } catch (\Exception $e) {
            return response($e->getMessage(), 400);
        }
        // } catch (\Throwable $th) {
        //     Log::error($th);
        //     return response($th, 500);
        // }
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

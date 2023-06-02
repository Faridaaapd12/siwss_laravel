<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Repositories\PackageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $packageRepo;
    public function __construct(PackageRepository $packageRepo)
    {
        $this->packageRepo = $packageRepo;
    }

    public function index()
    {
        $packages = Package::all();

        return view('welcome', ['packages' => $packages]);
    }

    public function packageGridIndex(Request $r)
    {
        $load = $r->query('load');
        // dd(session());

        if (session()->has($this->packageSession)) {
            session()->reflash();
            return view('packagegrid', ['packages' => session()->get($this->packageSession)]);
        }

        if (session()->has($this->homeSession)) {
            session()->reflash();
            return view('packagegrid', ['packages' => session()->get($this->homeSession)]);
        }

        if (session()->has($this->allPackage)) {
            session()->reflash();
            return view('packagegrid', ['packages' => session()->get($this->allPackage)]);
        }

        if ($load != null) {
            return view('packagegrid', ['packages' => $this->packageRepo->packageListWithAverageRating(intval($load), "all")]);
        } else {
            return view('packagegrid', ['packages' => $this->packageRepo->packageListWithAverageRating(1, "all")]);
        }
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

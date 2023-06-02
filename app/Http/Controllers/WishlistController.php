<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Repositories\SearchRepository;

class WishlistController extends Controller
{
    private $searchRepo;

    public function __construct(SearchRepository $searchRepo)
    {
        $this->searchRepo = $searchRepo;
    }

    public function index()
    {
        $wishlist = new Wishlist();

        return view('wishlist', ['wishlists' => $wishlist->wishData()]);
    }

    public function add(Request $request)
    {
        $packageId = $request->input('package_id');
        $wishlist = new Wishlist();
        $wishlist->guardedAdd(
            auth()->user()->id,
            $packageId
        );

        if (url()->previous() != url('/wishlist')) {
            if ($request->session()->has($this->packageSession)) {
                $prevSearch = $request->session()->get($this->packageSession)[0]["prevpackagesSearch"];

                session()->forget($this->packageSession);

                $packageSearch = $this->searchRepo->packagesSearch($prevSearch);

                session()->flash($this->packageSession, $packageSearch);
            }

            if ($request->session()->has($this->homeSession)) {
                $prevSearch = $request->session()->get($this->homeSession)[0]["prevHomeSearch"];
                session()->forget($this->homeSession);
                $homeSearch = $this->searchRepo->homeSearch($prevSearch);

                session()->flash($this->homeSession, $homeSearch);
            }
        }


        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $wishlistId = intval($request->input('wishlist_id'));
        $wishlist = Wishlist::find($wishlistId);
        $wishlist->delete();

        if (url()->previous() != url('/wishlist')) {
            if ($request->session()->has($this->packageSession)) {
                $prevSearch = $request->session()->get($this->packageSession)[0]["prevpackagesSearch"];

                session()->forget($this->packageSession);

                $packageSearch = $this->searchRepo->packagesSearch($prevSearch);

                session()->flash($this->packageSession, $packageSearch);
            }

            if ($request->session()->has($this->homeSession)) {
                $prevSearch = $request->session()->get($this->homeSession)[0]["prevHomeSearch"];
                session()->forget($this->homeSession);
                $homeSearch = $this->searchRepo->homeSearch($prevSearch);

                session()->flash($this->homeSession, $homeSearch);
            }
        }

        return redirect()->back();
    }
}

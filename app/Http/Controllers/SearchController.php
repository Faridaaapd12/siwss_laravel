<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SearchRepository;

class SearchController extends Controller
{
    private $searchRepo;

    public function __construct(SearchRepository $searchRepo)
    {
        $this->searchRepo = $searchRepo;
    }

    public function homeSearch(Request $r)
    {
        $packageName = empty($r->packageName) ? '' : $r->packageName;
        $maxpeople = empty($r->maxpeople) ? '' : (int) $r->maxpeople;

        $homepackageSearch = $this->searchRepo->homeSearch([
            "package_name" => $packageName,
            "maxpeople" => $maxpeople,
            "sort" => "all"
        ]);

        return redirect('/packages/grid')->with($this->homeSession, $homepackageSearch);
    }

    public function gridSearch(Request $r)
    {
        $packageName = empty($r->packageName) ? '' : $r->packageName;
        $location = empty($r->location) ? '' : $r->location;
        $maxpeople = empty($r->maxpeople) ? '' : (int) $r->maxpeople;

        $packagesSearch = $this->searchRepo->packagesSearch([
            "package_name" => $packageName,
            "location" => $location,
            "maxpeople" => $maxpeople,
            "sort" => "all",
        ]);

        return redirect("/packages/grid")->with($this->packageSession, $packagesSearch);
    }

    public function listSearch(Request $r)
    {
        $packageName = empty($r->packageName) ? '' : $r->packageName;
        $location = empty($r->location) ? '' : $r->location;
        $maxpeople = empty($r->maxpeople) ? '' : (int) $r->maxpeople;

        $packagesSearch = $this->searchRepo->packagesSearch([
            "package_name" => $packageName,
            "location" => $location,
            "maxpeople" => $maxpeople,
            "sort" => "all"
        ]);

        return redirect("/packages/list")->with($this->packageSession, $packagesSearch);
    }
}

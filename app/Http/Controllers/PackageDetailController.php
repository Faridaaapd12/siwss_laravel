<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Package;
use App\Repositories\PackageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class PackageDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private PackageRepository $packageRepo;

    public function __construct(PackageRepository $packageRepo)
    {
        $this->packageRepo = $packageRepo;
    }

    public function index(Request $r, $id)
    {
        return view('packagedetail', [
            'package' => $this->packageRepo->packageDetail($id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postReview(Request $r)
    {
        $userId = intval($r->input("userId"));
        $packageId = $r->input("packageId");
        $rating = floatval($r->input('rating_review'));
        $content = $r->input('review_text');

        $comment = new Comment();

        $comment->rating = $rating;
        $comment->content = $content;
        $comment->user_id = $userId;
        $comment->package_id = $packageId;
        
        $comment->save();
        
        return redirect("/package/".$packageId);
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
        // $package = Package::find($id);
        // // $review = DB::table('comments')
        // //         ->select(DB::raw('comments.*'))
        // //         ->join('packages','packages.id','=','comments.package_id','left')
        // //         ->join('users','users.id','=','comments.user_id','left')
        // //         ->where('packages.id',$id)
        // //         ->get();
        // $review = Comment::where('comments.package_id', $id)
        //             ->get().map(function ($comment, $key){
        //                 return [
                            
        //                 ]
        //             });

        // dd($this->packageRepo->packageDetail($id));
        return view('packagedetail', ['package' => $this->packageRepo->packageDetail($id)]);
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

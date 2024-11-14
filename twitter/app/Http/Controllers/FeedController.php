<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $follwingID = auth()->user()->followings()->pluck('user_id');
        $ideas = Idea::whereIn('user_id', $follwingID);
        if(request()->has('search')){
            $ideas = $ideas->where('content','like' , '%'. request()->get('search','').'%');
        }

        return view('feed',[
            'ideas' => $ideas->paginate(3)
        ]);
    }
}

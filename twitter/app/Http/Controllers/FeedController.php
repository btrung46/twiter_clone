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
        $ideas = Idea::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy('created_at', 'DESC')->paginate(3);


        return view('feed',[
            'ideas' => $ideas
        ]);
    }
}

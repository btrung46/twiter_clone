<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class FollowController extends Controller
{
    public function follow(User $user){
        $follower = auth()->user();

        $follower->followings()->attach($user->id);
        return redirect()->route('user.show',$user->id);
    }
    public function unfollow(User $user){
        $follower = auth()->user();

        $follower->followings()->detach($user->id);
        return redirect()->route('user.show',$user->id);
    }
}

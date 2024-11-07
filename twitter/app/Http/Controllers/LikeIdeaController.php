<?php

namespace App\Http\Controllers;
use App\Models\Idea;
use Auth;
use Illuminate\Http\Request;

class LikeIdeaController extends Controller
{
    public function toggleLike(Idea $idea)
    {
        $user = Auth::user();

        // Kiểm tra nếu người dùng đã like thì sẽ unlike, ngược lại thì like
        if ($user->likes()->where('idea_id', $idea->id)->exists()) {
            $user->likes()->detach($idea->id); // Unlike
            $status = 'unliked';
        } else {
            $user->likes()->attach($idea->id); // Like
            $status = 'liked';
        }

        // Trả về kết quả JSON
        return response()->json([
            'status' => $status,
            'likes_count' => $idea->likes()->count()
        ]);
    }
}

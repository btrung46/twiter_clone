<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Idea;
class CommentController extends Controller
{
    public function create_commment(Idea $idea){
        request()->validate([
            'comment' => 'required|min:1|max:240'
        ]);
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->comment = request()->get('comment');
        $comment->save();
        return redirect()->route('idea.show',$idea->id)->with('success','comment created successfully!!!');
    }
}

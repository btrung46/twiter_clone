<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Idea;
class CommentController extends Controller
{
    public function create_commment(Idea $idea){
        $valid = request()->validate([
            'comment' => 'required|min:1|max:240'
        ]);
        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->idea_id = $idea->id;
        $comment->comment = $valid['comment'];
        $comment->save();
        return redirect()->route('idea.show',parameters: $idea->id)->with('success','comment created successfully!!!');
    }
    public function delete(Idea $idea,Comment $comment){
        $this->authorize('delete',$comment);
        $comment->delete();
        return redirect()->route('idea.show',parameters: $idea->id)->with('success','comment delete successfully!!!');
    }
}

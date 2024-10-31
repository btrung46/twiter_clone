<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
class IdeaController extends Controller
{
    public function create_idea(){
        $valid = request()->validate([
            'content'=> 'required|min:3|max:240'
        ]);
        $valid['user_id'] = auth()->id();
        $idea = Idea::create($valid);
        return redirect()->route('dashboard')->with('success','idea create successfully!!!');
    }
    public function delete_idea(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $idea -> delete();

        return redirect()->route('dashboard')->with('success','idea deleted successfully!!!');
    }
    public function show_idea(Idea $idea){
        return view('idea.show_idea',compact('idea'));
    }
    public function edit_idea(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $editting = true;
        return view('idea.show_idea',compact('idea','editting'));
    }
    public function update_idea(Idea $idea){
        if(auth()->id() !== $idea->user_id){
            abort(404);
        }
        $valid= request()->validate([
            'content'=> 'required|min:3|max:240'
        ]);
        $idea ->content = $valid['content'];
        $idea->save();

        return redirect()->route('idea.show',$idea->id)->with('success','idea updated successfully!!!');
    }
}

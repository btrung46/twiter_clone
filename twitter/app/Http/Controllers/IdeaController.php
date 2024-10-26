<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
class IdeaController extends Controller
{
    public function create_idea(){
        request()->validate([
            'idea'=> 'required|min:3|max:240'
        ]);
        $idea = Idea::create([
            'content' =>request()->get('idea')
        ]);
        return redirect()->route('dashboard')->with('success','idea create successfully!!!');
    }
    public function delete_idea(Idea $id){
        $id -> delete();

        return redirect()->route('dashboard')->with('success','idea deleted successfully!!!');
    }
    public function show_idea(Idea $idea){
        return view('idea.show_idea',compact('idea'));
    }
    public function edit_idea(Idea $idea){
        $editting = true;
        return view('idea.show_idea',compact('idea','editting'));
    }
    public function update_idea(Idea $idea){
        request()->validate([
            'content'=> 'required|min:3|max:240'
        ]);
        $idea ->content = request()->get('content','');
        $idea->save();

        return redirect()->route('idea.show',$idea->id)->with('success','idea updated successfully!!!');
    }
}

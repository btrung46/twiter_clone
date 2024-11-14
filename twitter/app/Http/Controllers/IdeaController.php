<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaRequest;
use Illuminate\Http\Request;
use App\Models\Idea;
class IdeaController extends Controller
{
    public function create_idea(IdeaRequest $request){
        $valid = $request->validated();
        $valid['user_id'] = auth()->id();
        $idea = Idea::create($valid);
        return redirect()->route('dashboard')->with('success','idea create successfully!!!');
    }
    public function delete_idea(Idea $idea){
        $this->authorize('delete',$idea);
        $idea -> delete();

        return redirect()->route('dashboard')->with('success','idea deleted successfully!!!');
    }
    public function show_idea(Idea $idea){
        return view('idea.show_idea',compact('idea'));
    }
    public function edit_idea(Idea $idea){
        $this->authorize('update',$idea);
        $editting = true;
        return view('idea.show_idea',compact('idea','editting'));
    }
    public function update_idea(Idea $idea,IdeaRequest $request){
        $this->authorize('update',$idea);
        $valid = $request->validated();
        $idea ->content = $valid['content'];
        $idea->save();

        return redirect()->route('idea.show',$idea->id)->with('success','idea updated successfully!!!');
    }
}

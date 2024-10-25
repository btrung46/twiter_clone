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
}

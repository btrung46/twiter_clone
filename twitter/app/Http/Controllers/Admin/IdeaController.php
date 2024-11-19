<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Idea;
class IdeaController extends Controller
{
    public function index(){
        $ideas = Idea::latest()->paginate(5);
        return view('admin.idea.index',compact('ideas'));
    }
}

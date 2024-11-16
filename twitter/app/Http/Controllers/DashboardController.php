<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{

    public function index(){
        $ideas = Idea::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy('created_at', 'DESC')->paginate(3);

        return view('dashboard',[
            'ideas' => $ideas
        ]);
    }
}

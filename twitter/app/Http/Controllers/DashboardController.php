<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard',[
            'ideas' => Idea::orderBy("created_at","DESC")->paginate(3)
        ]);
    }
}

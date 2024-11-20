<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
class DashboardController extends Controller
{
    public function index(){
        $totalUsers = User::count();
        $totalIdeas = Idea::count();
        $totalComments = Comment::count();

        return view(
            'admin.dashboard',
            compact('totalUsers', 'totalIdeas', 'totalComments')
        );
    }
}

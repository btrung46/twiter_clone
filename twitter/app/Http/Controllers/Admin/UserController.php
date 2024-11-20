<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->paginate(5);
        return view('admin.Users.index',compact('users'));
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.users')->with('success','User deleted successfull!!');
    }
}

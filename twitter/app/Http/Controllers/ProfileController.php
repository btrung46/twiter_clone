<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Idea;
use Storage;
class ProfileController extends Controller
{
    public function show(User $user){
        $edit = false;
        $ideas = $user->idea()->paginate(3);
        return view('users.profile',compact('user','edit','ideas'));
    }
    public function edit(User $user){
        $edit = true;
        $ideas = $user->idea()->paginate(3);
        return view('users.profile_edit',compact('user','edit','ideas'));
    }
    public function update(User $user){
        if(auth()->id() !== $user->id){
            abort(404);
        }
        $valid= request()->validate([
            'name'=> 'required|min:3|max:40',
            'bio'=> 'nullable|min:3|max:250',
            'image' => 'image'
        ]);
        if(request()->has('image')){
            $imagePath = request()->file('image')->store('Profile','public');
            $valid['image'] = $imagePath;
            Storage::disk('public')->delete($user->image  ?? '');
        }
        $user->update($valid);

        return redirect()->route('user.show',$user->id)->with('success','user updated successfully!!!');
    }
}

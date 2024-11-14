<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRquest;
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
        $this->authorize('update',$user);
        $edit = true;
        $ideas = $user->idea()->paginate(3);
        return view('users.profile_edit',compact('user','edit','ideas'));
    }
    public function update(User $user,UserRquest $request){
        $this->authorize('update',$user);

        $valid = $request->validated();

        if($request->has('image')){
            $imagePath = $request->file('image')->store('Profile','public');
            $valid['image'] = $imagePath;
            Storage::disk('public')->delete($user->image  ?? '');
        }
        $user->update($valid);

        return redirect()->route('user.show',$user->id)->with('success','user updated successfully!!!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileEditRequest;
use App\Http\Requests\ProfileUploadRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function list()
    {
        $users = User::where('id', '<>', Auth::id());

        $users = $users->get();
        return view('profile.list', ['users' => $users]);
    }
    public function view_own()
    {
        return view('profile.view', ['user' => Auth::user()]);
    }
    public function view(User $user)
    {
        return view('profile.view', ['user' => $user]);
    }
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }
    public function update(ProfileEditRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->birthday = $request->birthday;
        $user->perf = $request->perf;
        $user->comment = $request->comment;
        $user->save();

        return redirect()->route('profile.view_own');
    }
    public function upload_view()
    {
        return view('profile.upload');
    }
    public function upload(ProfileUploadRequest $request)
    {
        $uuid  = (string)Str::uuid();
        $fname = substr($uuid, -12);
        $fname = $fname.'.'.$request->file('image')->getClientOriginalExtension();
        $dir   = substr($uuid, 13);
        $dir   = 'profile'.str_replace('-', '/', $dir);
        $path = $dir.'/'.$fname;

        $request->file('image')->storeAs($dir, $fname);
        
        $user = Auth::user();
        $user->image = $path;
        $user->save();

        return redirect()->route('profile.view_own');
    }
}

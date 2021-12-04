<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileEditRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
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
}

<?php

namespace App\Http\Controllers;

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
}

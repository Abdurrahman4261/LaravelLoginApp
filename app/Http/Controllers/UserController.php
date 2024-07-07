<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('adminprofile', compact('users'));
    }
    public function userprofile()
    {
        $user = Auth::user();
        return view('userprofile', compact('user'));
    }
}
